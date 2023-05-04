<?php include('login.php') ?>
<?php include('jsonapi.php'); ?>
<?php include('data.php'); ?>
<?php include('byjson.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $yzm["title"];?> - 播放器后台管理</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
	<script type="text/javascript" src="https://www.layuicdn.com/layui/layui.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/config.js" type="text/javascript" charset="utf-8"></script>

	<style>
		.layui-elem-field {
			border-color: #00bcd4;
		}

		.width {
			width: 120px !important;
			text-align: center;
		}

		.long {
			width: 300px !important;
			text-align: center;
		}

		.smt {
			width: 75px !important;
			text-align: center;
		}

		.sm {
			width: 50px !important;
			text-align: center;
		}

		.layui-textarea {
			min-height: 60px;
			height: 38px;
		}

		#configSave {
			margin-bottom: 0;
			background-color: #00BCD4;
			color: #ffffff;
			height: 39px;
			border-radius: 2px 2px 0 0;
			width: 80px;
			border-width: 1px;
			border-style: solid;
			border-color: #00BCD4;
		}

		.layui-form-pane .layui-form-label {
			padding: 8px 5px;
		}
	
	</style>
</head>

<body>
	<form class="layui-form layui-form-pane" name="configform" id="configform">
		<div class="layui-tab" overflow>
			<ul class="layui-tab-title">
			    <li class="layui-this">基本设置</li>
				<li class="">弹幕设置</li>
				<li class="">JSON设置</li>
				<li class="">广告设置</li>
				<li class="">弹幕管理</li>
			</ul>
			<div class="layui-tab-content">
			    
			    
				<div class="layui-tab-item layui-show" name="解析设置">
				    <div class="layui-form-item">
						<label class="layui-form-label">JSON地址</label>
						<div class="layui-input-inline long">
							<select name="yzm[jsonapi]" lay-verify="required" id="jc">
							    <?php 
							    foreach ($jsonapi as $key => $value){
							    ?>
								<option <?php if($key==$yzm['jsonapi']){ echo 'selected'; } ?> value="<?php echo $key ?>"><?php echo $value ?></option>
								<?php } ?>
							</select>
                      </div>
                      <button type="button" class="layui-btn jc">检测通信</button>　<font color=#999999 size=2>默认JSON接口，蓝光妙播，另外还可以设置5个备用JSON接口，无法解析会自动轮询备用JSON接口</font>
                      <div class="jsonapi">
                          
                      </div>
                  </div>  
					<div class="layui-form-item">
						<label class="layui-form-label">播放器</label>
						<div class="layui-input-inline">
							<select name="yzm[khd]" lay-verify="required">
								<option value="dm" <?php $t = $yzm['khd'];
													if ($t == "dm") {
														echo "selected";
													} ?>>弹幕播放器</option>
								<option value="dp" <?php $t = $yzm['khd'];
													if ($t == "dp") {
														echo "selected";
													} ?>>pc手机全dp</option>
								<option value="h5" <?php $t = $yzm['khd'];
													if ($t == "h5") {
														echo "selected";
													} ?>>pc弹幕手机h5</option>
							</select>
                      </div>
                      <div class="layui-form-mid layui-word-aux">提供多种模式：可以选择弹幕、DP、H5等播放器</div>
                  </div>  
 					<div class="layui-form-item">
						<label class="layui-form-label">防调试</label>                      
						<div class="layui-input-inline">
							<input type="checkbox" name="yzm[isDebuggerOk]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['isDebuggerOk'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>                   
                  
					<div class="layui-form-item">
						<label class="layui-form-label">防盗链开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[fdhost_on]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['fdhost_on'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">允许空Referer</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[blank_referer]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['blank_referer'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">防盗链域名</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[fdhost]" value="<?php echo $yzm['fdhost'] ?>" size="30" class="layui-input upload-input" placeholder="www.hao123.com,hao123.com">
						</div>
						<div class="layui-form-mid layui-word-aux">设置防盗链域名，用英文逗号隔开，不需要加http|https和端口号</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">右键文字</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[right_wenzi]" value="<?php echo $yzm['right_wenzi'] ?>" size="30" class="layui-input upload-input" placeholder="<?php echo $yzm["title"];?>">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器PC上右键文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">右键链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[right_link]" value="<?php echo $yzm['right_link'] ?>" size="30" class="layui-input upload-input" placeholder="https://www.baidu.com">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器PC上右键链接</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">加载页面TITLE</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[title]" value="<?php echo $yzm['title'] ?>" size="50" class="layui-input upload-input" placeholder="<?php echo $yzm["title"];?>">
						</div>
						<div class="layui-form-mid layui-word-aux">接口页面标题TITLE</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">未填写url提示</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[url_wenzi]" value="<?php echo $yzm['url_wenzi'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">未填写url时的提示文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">防盗链提示</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[referer_wenzi]" value="<?php echo $yzm['referer_wenzi'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">触发防盗链时的提示文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">解析失败提示</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[error_wenzi]" value="<?php echo $yzm['error_wenzi'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">解析失败时的提示文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">Footer代码</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[footer]" value="<?php echo $yzm['footer'] ?>" size="999" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">此处可以填写统计，广告等代码（用双单引号）</div>
					</div>
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>
				<div class="layui-tab-item" name="基本设置">
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[danmuon]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['danmuon'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">启用公共弹幕库</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[public_dmku]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['public_dmku'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">主题颜色</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[color]" value="<?php echo $yzm['color'] ?>" size="30" class="layui-input upload-input" placeholder="颜色代码">
						</div>
						<div class="layui-form-mid layui-word-aux">颜色代码 例如：#00CCFF</div>
					</div>                
					<div class="layui-form-item">
						<label class="layui-form-label">LOGO</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[logo]" value="<?php echo $yzm['logo'] ?>" size="30" class="layui-input upload-input" placeholder="图片地址">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器右上角LOGO，图片地址 例如：http://xxx.com/logo.png</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">LOGO宽高</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[logo_width_height]" value="<?php echo $yzm['logo_width_height'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器右上角LOGO宽和高，用英文逗号隔开</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">加载页面开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[loading_on]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['loading_on'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">加载页面动画</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[loading_pic]" value="<?php echo $yzm['loading_pic'] ?>" size="30" class="layui-input upload-input" placeholder="/player/img/20200519223109.gif">
						</div>
						<div class="layui-form-mid layui-word-aux">加载loading页面动画链接</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">加载动画宽高</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[loading_width_height]" value="<?php echo $yzm['loading_width_height'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">loading页面gif的宽和高，用英文逗号隔开</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">加载页面背景颜色</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[loading_color]" value="<?php echo $yzm['loading_color'] ?>" size="30" class="layui-input upload-input" placeholder="#000">
						</div>
						<div class="layui-form-mid layui-word-aux">loading加载页面背景颜色</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕发送间隔</label>
						<div class="layui-input-inline">
							<input type="text" name="yzm[sendtime]" value="<?php echo $yzm['sendtime'] ?>" size="30" class="layui-input upload-input" placeholder="单位/秒">
						</div>
						<div class="layui-form-mid layui-word-aux">指的是发送时间只能在设置时间后才能重新发送新弹幕</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕礼仪链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[dmrule]" value="<?php echo $yzm['dmrule'] ?>" size="30" class="layui-input upload-input" placeholder="链接地址">
						</div>
						<div class="layui-form-mid layui-word-aux">弹幕框右边按钮链接</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕关键字禁用</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[pbgjz]" value="<?php echo $yzm['pbgjz'] ?>" size="30" class="layui-input upload-input" placeholder="输入关键字以" ,"隔开">
						</div>
						<div class="layui-form-mid layui-word-aux">输入关键字以","隔开</div>
					</div>
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>
				<div class="layui-tab-item" name="JSON设置">
				    
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口一</label>
						<div class="layui-input-inline long">
							<input type="text" name="byjson[by_json1]" value="<?php echo $byjson['by_json1'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">填写备用JSON接口</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口二</label>
						<div class="layui-input-inline long">
							<input type="text" name="byjson[by_json2]" value="<?php echo $byjson['by_json2'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">填写备用JSON接口</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口三</label>
						<div class="layui-input-inline long">
							<input type="text" name="byjson[by_json3]" value="<?php echo $byjson['by_json3'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">填写备用JSON接口</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口四</label>
						<div class="layui-input-inline long">
							<input type="text" name="byjson[by_json4]" value="<?php echo $byjson['by_json4'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">填写备用JSON接口</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口五</label>
						<div class="layui-input-inline long">
							<input type="text" name="byjson[by_json5]" value="<?php echo $byjson['by_json5'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">填写备用JSON接口</div>
					</div>
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
					
				</div>				
				<div class="layui-tab-item" name="广告设置">
					<div class="layui-form-item">
						<label class="layui-form-label">暂停广告开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="yzm[ads][pause][state]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $yzm['ads']['pause']['state'];
																																				if ($t == "on") {
																																					echo "checked";
																																				} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">暂停图片</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][pause][pic]" value="<?php echo $yzm['ads']['pause']['pic'] ?>" size="30" class="layui-input upload-input" placeholder="图片地址">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">暂停图片链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="yzm[ads][pause][link]" value="<?php echo $yzm['ads']['pause']['link'] ?>" size="30" class="layui-input upload-input" placeholder="点击链接地址">
						</div>
					</div>
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>
				
				<div class="layui-tab-item" name="弹幕管理">
					<div class="layui-tab" overflow>
						<ul class="layui-tab-title">
							<li class="layui-this">弹幕列表</li>
							<li class="">举报列表</li>
						</ul>
						<div class="layui-tab-content">
							<div class="layui-tab-item layui-show" name="弹幕列表">
								<div class="chu" style="margin-top:30px">
									<div class="demoTable layui-form-item">
										<div class="layui-inline">
											<label class="layui-form-label">搜索</label>
											<div class="layui-input-inline">
												<input class="layui-input" id="textdemo" placeholder="请输入弹幕id或弹幕关键字">
											</div>
											<button class="layui-btn" lay-submit="search_submits" type="button" lay-filter="reloadlst_submit">搜索</button>
										</div>
									</div>
								</div>
								<table class="layui-hide" id="dmlist" lay-filter="dmlist">
								</table>
							</div>

							<div class="layui-tab-item" name="举报列表">
								<table class="layui-hide" id="dmreport" lay-filter="report">
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
	<script type="text/html" id="listbar">
		<a class="layui-btn layui-btn-xs" lay-event="dmedit">编辑</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
	</script>
	<script type="text/html" id="reportbar">
		<a class="layui-btn layui-btn-xs" lay-event="edit">误报</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
	</script>

	<script type="text/template" id="bondTemplateList">
		<div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" lay-filter="component-form-group" id="submits" onsubmit="return false">
            <div class="layui-row layui-col-space10 layui-form-item">
                <input type="hidden" name="cid" value="{{ d[4] }}">
                <div class="layui-col-lg5">
                    <label class="layui-form-label">弹幕ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" placeholder="请输入名称" autocomplete="off"
                               lay-verify="required" class="layui-input"
                               value="{{ d[0]?d[0]:'' }}" {{# if(d[0]){ }}disabled{{# } }}>
                    </div>
                </div>
                <div class="layui-col-lg5">
                    <label class="layui-form-label">颜色：</label>
  						<div class="layui-input-block">
							<div class="layui-input-inline" style="width: 120px;">
								<input type="text" name="color" placeholder="请选择颜色" class="layui-input" id="test-form-input" value="{{ d[3]?d[3]:'' }}">
							</div>
						<div class="layui-inline" style="left: -11px;">
						<div id="test-form"></div>
					</div>
				</div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">弹幕内容</label>
                    <div class="layui-input-block">
                    <textarea name="text" placeholder="请输入内容" class="layui-textarea"
                              lay-verify="required">
                        {{ d[5] ? d[5]:'' }}
                    </textarea>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="bond_sumbit">立即提交</button>
                </div>
            </div>
        </form>
    </div>
</script>			
				
				
				
		</div>
		</div>
	</form>
	<script>
	    $(function(){
	        $('.jc').click(function(){
	            url = $("#jc option:selected").text();
	            $.ajax({
	                url:'./jc.php',
	                type:'post',
	                data:{
	                    url,
	                },
	                success(data){
	                    if(data=='success'){
	                        $('.jsonapi').html('<p style="color:green;margin-left:20px;">当前地址检测正常！</p>');
	                    }else{
	                        $('.jsonapi').html('<p style="color:red;margin-left:20px;">该地址异常,请更换其他api！</p>');
	                    }
	                }
	            })
	        })
	    })
	</script>
</body>

</html>