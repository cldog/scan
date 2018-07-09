<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/prettify.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<script type="text/javascript">
	function yooy() {
		var test=document.getElementsByClassName("sub");
		var test1=document.getElementById("ppp");
		var formstr='';


		for(var i=0;i<test.length;i++){
			console.log(test[i]);
			formstr+='<input type="text" name="' + test[i].name + '" value="' + test[i].value + '">';
		}
		var radio=document.getElementsByClassName("1");
		for(var i=0;i<radio.length;i++){
			if(radio[i].checked==true) {
				var selectvalue=radio[i].value;
				var selectname=radio[i].name;
				break;

			}

		}
		formstr+='<input type="text" name="' + selectname + '" value="' + selectvalue + '">';

		test1.innerHTML = formstr;
		test1.style.visibility="hidden";
		test1.submit();
	}
	</script>
</head>
<body>
	<div class="htmleaf-container">
		<header class="htmleaf-header bgcolor-11">
		</header>

		<script type="text/javascript">
			function yo() {
				var radio=document.getElementsByClassName("1");
				for(var i=0;i<radio.length;i++){
					if(radio[i].checked==true) {
						var selectvalue=radio[i].value;
						if (selectvalue!='3'){
							document.getElementById("div1111").innerHTML = '非必需参数';
						}
						else{
							if(!document.getElementById("add")){
								var obj=document.createElement("input");
								obj.setAttribute("class","sub");
								obj.name="port";
								obj.id="add";

								document.getElementById("div1111").appendChild(obj);
							}


						}
						break;

        	}
				}

			}
		</script>




		<div class='container'>
			<section id="wizard">
			  <div class="page-header">
	            <h1>尽情扫描吧</h1>
	          </div>


		<div id="tabsleft" class="tabbable tabs-left">
					<ul>
					  	<li><a href="#tabsleft-tab1" data-toggle="tab" onclick="yo()">类型</a></li>
						<li><a href="#tabsleft-tab2" data-toggle="tab" onclick="yo()">ip</a></li>
						<li><a href="#tabsleft-tab3" data-toggle="tab" onclick="yo()">port</a> </li>
						<li><a href="#tabsleft-tab4" data-toggle="tab" onclick="yo()">网卡</a></li>
						<li><a href="#tabsleft-tab5" data-toggle="tab" onclick="yo()">线程</a></li>

					</ul>
                    <div id="bar" class="progress progress-info progress-striped">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
					<div class="tab-content">
					    <div class="tab-pane" id="tabsleft-tab1">
							<p>
                				扫描类型:<br>
                				<input type="radio" class="1" name="type" value="1"> link
                				<input type="radio" class="1" name="type"  value="2"> ip
                				<input type="radio" class="1" name="type" value="3" checked> transport
            				</p>

					    </div>


					    <div class="tab-pane" id="tabsleft-tab2">
							<p>

                				ip:</br>

                				<input id="ip" class="sub" type="text" name="ip">
						  	</p>
					    </div>
						<div class="tab-pane" id="tabsleft-tab3">
							<p>
							port:<br>
							<div id="div1111">

							</div>
							</p>
					    </div>
						<div class="tab-pane" id="tabsleft-tab4">
							<p>
                				网卡:<br>
                				<input id="interface" class="sub" type="text" name="interface">
            				</p>
					    </div>
						<div class="tab-pane" id="tabsleft-tab5">
							<p>
                				线程:<br>
                				<input id="thread" type="text" class="sub" name="thread">
								<br><br><br><br><br>
								<button onclick="yooy()">提交哦</button>
            				</p>

					    </div>


					</div>
				</div>

			</section>
			<div>
				<form id="ppp" action="action.php" method="post">
				</form>
			</div>


	<script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jquery.bootstrap.wizard.js"></script>
	<script src="js/prettify.js"></script>
	<script>
	$(document).ready(function() {
	  	$('#rootwizard').bootstrapWizard({'tabClass': 'nav', 'debug': false, onShow: function(tab, navigation, index) {
				console.log('onShow');
			}, onNext: function(tab, navigation, index) {
				console.log('onNext');
			}, onPrevious: function(tab, navigation, index) {
				console.log('onPrevious');
			}, onLast: function(tab, navigation, index) {
				console.log('onLast');
			}, onTabClick: function(tab, navigation, index) {
				console.log('onTabClick');
				alert('on tab click disabled');
			}, onTabShow: function(tab, navigation, index) {
				console.log('onTabShow');
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
                $('#rootwizard .progress-bar').css({width:$percent+'%'});
			}});

			$('#pills').bootstrapWizard({'tabClass': 'nav nav-pills', 'debug': false, onShow: function(tab, navigation, index) {
					console.log('onShow');
				}, onNext: function(tab, navigation, index) {
					console.log('onNext');
				}, onPrevious: function(tab, navigation, index) {
					console.log('onPrevious');
				}, onLast: function(tab, navigation, index) {
					console.log('onLast');
				}, onTabClick: function(tab, navigation, index) {
					console.log('onTabClick');
					alert('on tab click disabled');
				}, onTabShow: function(tab, navigation, index) {
					console.log('onTabShow');
					var $total = navigation.find('li').length;
					var $current = index+1;
					var $percent = ($current/$total) * 100;
                    $('#pills .progress-bar').css({width:$percent+'%'});
				}});

			$('#tabsleft').bootstrapWizard({'tabClass': 'nav nav-tabs', 'debug': false, onShow: function(tab, navigation, index) {
						console.log('onShow');
					}, onNext: function(tab, navigation, index) {
						console.log('onNext');
					}, onPrevious: function(tab, navigation, index) {
						console.log('onPrevious');
					}, onLast: function(tab, navigation, index) {
						console.log('onLast');
					}, onTabClick: function(tab, navigation, index) {
						console.log('onTabClick');

					}, onTabShow: function(tab, navigation, index) {
						console.log('onTabShow');
						var $total = navigation.find('li').length;
						var $current = index+1;
						var $percent = ($current/$total) * 100;
                        $('#tabsleft .progress-bar').css({width:$percent+'%'});

						// If it's the last tab then hide the last button and show the finish instead
						if($current >= $total) {
							$('#tabsleft').find('.pager .next').hide();
							$('#tabsleft').find('.pager .finish').show();
							$('#tabsleft').find('.pager .finish').removeClass('disabled');
						} else {
							$('#tabsleft').find('.pager .next').show();
							$('#tabsleft').find('.pager .finish').hide();
						}

					}});

				$('#inverse').bootstrapWizard({'tabClass': 'nav', 'debug': false, onShow: function(tab, navigation, index) {
						console.log('onShow');
					}, onNext: function(tab, navigation, index) {
						console.log('onNext');
						if(index==2) {
							// Make sure we entered the name
							if(!$('#name').val()) {
								alert('You must enter your name');
								$('#name').focus();
								return false;
							}
						}

						// Set the name for the next tab
						$('#inverse-tab3').html('Hello, ' + $('#name').val());

					}, onPrevious: function(tab, navigation, index) {
						console.log('onPrevious');
					}, onLast: function(tab, navigation, index) {
						console.log('onLast');
					}, onTabClick: function(tab, navigation, index) {
						console.log('onTabClick');
						alert('on tab click disabled');
						return false;
					}, onTabShow: function(tab, navigation, index) {
						console.log('onTabShow');
						var $total = navigation.find('li').length;
						var $current = index+1;
						var $percent = ($current/$total) * 100;
                        $('#inverse .progress-bar').css({width:$percent+'%'});
					}});


				$('#tabsleft .finish').click(function() {
					alert('Finished!, Starting over!');
					$('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');
				});

		});
	</script>
</body>
</html>
<?php
$type=$_POST['type'];
if($type=='1'){
  $ip=$_POST['ip'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("python ./scan.py -link $ip $iface $thread");
}
if($type=='2'){
  $ip=$_POST['ip'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("python ./scan.py -ip $ip $iface $thread");
}
if($type=='1'){
  $ip=$_POST['ip'];
  $port=$_POST['port'];
  $iface=$_POST['interface'];
  $thread=$_POST['thread'];
  system("python ./scan.py -transport $ip $posr $iface $thread");
}
?>
