<?php
/**
 * zh_cjpt模块微站定义
 *
 * @author 新睿社区
 * @url http://www.010xr.com/
 */
defined('IN_IA') or exit('Access Denied');

require IA_ROOT.'/addons/zh_cjpt/inc/func/core.php';
class Zh_cjptModuleSite extends Core {

	//订单详情
	public function doMobileGetOrderInfo(){
		 global $_W,$_GPC;
		 $sql="SELECT a.*,b.name,b.tel FROM ".tablename('cjpt_dispatch'). " a left join".tablename('cjpt_rider')." b on a.qs_id=b.id where a.uniacid={$_W['uniacid']} and a.id={$_GPC['id']} ORDER BY a.id DESC";
		 $res=pdo_fetch($sql);
		 $res['cs_time']='';
		 if(time()>$res['jd_time']+3600){

		 	 $res['cs_time']=time()-($res['jd_time']+3600);
		 }
		 $res['sd_time']=date('Y-m-d H:i:s',($res['jd_time']+3600));
		 $res['time']=date('Y-m-d H:i:s',$res['time']);
		 $res['jd_time']=date('Y-m-d H:i:s',$res['jd_time']);
		 $res['dd_time']=date('Y-m-d H:i:s',$res['dd_time']);
		 $res['wc_time']=date('Y-m-d H:i:s',$res['wc_time']);
		 echo json_encode($res);

	}

	//获取不忙的骑手
	public function doMobileGetRider(){
		global $_W,$_GPC;
		$time=date('Y-m-d');
		//推荐骑手(今日空闲骑手)
		$sql=" select id,name,tel from".tablename('cjpt_rider')." where id not in ( SELECT  qs_id FROM ".tablename('cjpt_dispatch')." where uniacid={$_W['uniacid']} and  FROM_UNIXTIME(time) like '%{$time}%' and state !=1) and state=2 and status=1";
		$rst=pdo_fetchall($sql);
		$sql2=" select id,name,tel from".tablename('cjpt_rider')." where uniacid={$_W['uniacid']}  and state=2 and status=1";
		$rst2=pdo_fetchall($sql2);
		$data['tj']=$rst;
		$data['sy']=$rst2;
		echo json_encode($data);
	}

//接单
	public function doMobileReceipt(){
		global $_GPC, $_W;
		$info=pdo_get('cjpt_dispatch',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
		if($info['state']==1){
			$rst=pdo_update('cjpt_dispatch',array('state'=>2,'qs_id'=>$_GPC['qs_id'],'jd_time'=>time()),array('id'=>$_GPC['id']));
			//$rst=1;
			if($rst){
				$qs=pdo_get('cjpt_rider',array('id'=>$_GPC['qs_id']));
				$res=pdo_get('cjpt_system',array('uniacid'=>$_W['uniacid']));
				$tpl_id=$res['tpl_id4'];            
				$tel=$qs['tel'];
				$key=$res['appkey'];
				$code=urlencode("#order_num#=".$info['order_id']."&#ps_num#=".$info['ps_num']."&#name#=".$info['sender_name']."&#address#=".$info['sender_address']);
				$url = "http://v.juhe.cn/sms/send?mobile=".$tel."&tpl_id=".$tpl_id."&tpl_value=".$code."&key=".$key;    
				$data=file_get_contents($url);
				$tpl_id=$res['tpl_id3'];			
				$tel=$info['receiver_tel'];
				$key=$res['appkey'];
				$code=urlencode("#name#=".$qs['name']."&#tel#=".$qs['tel']);
				$url = "http://v.juhe.cn/sms/send?mobile=".$tel."&tpl_id=".$tpl_id."&tpl_value=".$code."&key=".$key;	
				$data=file_get_contents($url);
					//更新餐饮订单信息
				$data2['qs_name']=$qs['name'];
				$data2['qs_tel']=$qs['tel'];
				$str=json_encode($data2,JSON_UNESCAPED_UNICODE);
				pdo_update('cjdc_order',array('pt_info'=>$str),array('order_num'=>$info['order_id']));
				echo '1';
			}else{
				echo '抢单失败';
			}
		}else{
			echo '抢单失败';
		}
	}


//骑手详情
public function doMobileGetRiderInfo(){
	global $_GPC, $_W;
	$info=pdo_get('cjpt_rider',array('id'=>$_GPC['id']));
	//有效资金
	$yx=pdo_get('cjpt_dispatch', array('uniacid'=>$_W['uniacid'],'qs_id '=>$_GPC['id'],'state'=>4), array('sum(ps_money) as total_money'));
	//冻结资金
	$dj=pdo_get('cjpt_dispatch', array('uniacid'=>$_W['uniacid'],'qs_id '=>$_GPC['id'],'state'=>array(2,3)), array('sum(ps_money) as total_money'));
	$info['yx']=$yx['total_money'];
	$info['dj']=$dj['total_money'];
	echo json_encode($info);

}

//骑手批量审核通过
public function doMobileShRider(){
	global $_GPC, $_W;
	$res=pdo_update('cjpt_rider',array('state'=>2,'sh_time'=>time()),array('id'=>$_GPC['id']));
	if($res){
		echo '1';
	}else{
		echo '2';
	}
}





}