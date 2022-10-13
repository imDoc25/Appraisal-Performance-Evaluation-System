
<?php $faculty_id = $_SESSION['login_id'] ?>
<?php 
function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return $num.'st';
            case 2: return $num.'nd';
            case 3: return $num.'rd';
        }
    }
    return $num.'th';
}
?>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12 mb-2 mt-2">
			<div class="d-flex justify-content-end w-100">
				<button class="btn btn-sm btn-danger bg-gradient-danger" style="display:none" id="print-btn"><i class="fa fa-print"></i> Print</button>
			</div>
		</div>
	</div>
	<div class="row">
	
		<div class="col-md-3">
		
			<div class="card">
			
				<div class="list-group" id="class-list">
					
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card card-outline card-danger" id="printable">
			<div>
			<div class="text-center">
			<img src="cdsplogo.png" style="width:50px;height:60px;"></img>
			<p><strong><font size="5">Colegio de San Pedro</font></strong><br>
			<font size="4">Institute of Computer Technology</font><br>
			<font size="2">Phase 1-A, Pacita Complex 1, San Pedro, Laguna</font></p>
			<hr>
				</div>
			<h3 class="text-center">Evaluation Result</h3>
			
			<table width="100%">
					<tr>
						<td width="50%"><p><b>School Year: <span id="ay"><?php echo $_SESSION['academic']['year'].' - '.(($_SESSION['academic']['semester'])) ?> </span></b></p></td>
						<td></td>
					</tr>
					<tr>
						<td width="50%"><p><b>Evaluator: <span id="classField"></span></b></p></td>
						<td width="50%"><p><b>Categories/Work Field: <span id="subjectField"></span></b></p></td>
					</tr>
			</table>
				<p class=""><b>Total Evaluator: <span id="tse"></span></b></p>
			</div>
				<fieldset class="border border-dark p-2 w-100">
				   <legend  class="w-auto">Rating Legend</legend>
				   <p align="center">5 = Strongly Agree, 4 = Agree, 3 = Uncertain, 2 = Disagree, 1 = Strongly Disagree</p>
				</fieldset>
				<br>
				<?php 
							$q_arr = array();
						$criteria = $conn->query("SELECT * FROM criteria_list where id in (SELECT criteria_id FROM question_list where academic_id = {$_SESSION['academic']['id']} ) order by abs(order_by) asc ");
						while($crow = $criteria->fetch_assoc()):
					?>
					<table class="table table-condensed wborder">
						<thead>
							<tr class="bg-gradient-dark">
								<th class=" p-1"><b><?php echo $crow['criteria'] ?></b></th>
								<th width="5%" class="text-center">1</th>
								<th width="5%" class="text-center">2</th>
								<th width="5%" class="text-center">3</th>
								<th width="5%" class="text-center">4</th>
								<th width="5%" class="text-center">5</th>
							</tr>
						</thead>
						<tbody class="tr-sortable">
							<?php 
							$questions = $conn->query("SELECT * FROM question_list where criteria_id = {$crow['id']} and academic_id = {$_SESSION['academic']['id']} order by abs(order_by) asc ");
							while($row=$questions->fetch_assoc()):
							$q_arr[$row['id']] = $row;
							?>
							<tr class="bg-white">
								<td class="p-1" width="40%">
									<?php echo $row['question'] ?>
								</td>
								<?php for($c=1;$c<=5;$c++): ?>
								<td class="text-center">
									<span class="rate_<?php echo $c.'_'.$row['id'] ?> rates"></span>
			                      </div>
								</td>
								<?php endfor; ?>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<style>
	.list-group-item:hover{
		color: white !important;
		font-weight: 600 !important;
		background-color: darkred !important;
	}
	.list-group-item{
		background-color: white !important;
		color: black !important;
		
	}
	.container-fluid{
		background-image: url("cdsp.jpg");  
    background-repeat: no-repeat;
    background-size: cover;
	}

	#fac{
		color: white;
	}

	.card{
		padding: 5px;
	}
	
</style>
<noscript>
	<style>
		table{
			width:100%;
			border-collapse: collapse;
		}
		table.wborder tr,table.wborder td,table.wborder th{
			border:1px solid gray;
			padding: 3px
		}
		table.wborder thead tr{
			background: #6c757d linear-gradient(180deg,#828a91,#6c757d) repeat-x!important;
    		color: #fff;
		}
		.text-center{
			text-align:center;
		} 
		.text-right{
			text-align:right;
		} 
		.text-left{
			text-align:left;
		} 
		
	</style>
</noscript>
<script>
	$(document).ready(function(){
		load_class()
	})
	function load_class(){
		start_load()
		$.ajax({
			url:"ajax.php?action=get_class",
			method:'POST',
			data:{fid:<?php echo $faculty_id ?>},
			error:function(err){
				console.log(err)
				alert_toast("An error occured",'error')
				end_load()
			},
			success:function(resp){
				if(resp){
					resp = JSON.parse(resp)
					if(Object.keys(resp).length <= 0 ){
						$('#class-list').html('<a href="javascript:void(0)" class="list-group-item list-group-item-action disabled">No current evaluators.</a>')
					}else{
						$('#class-list').html('')
						Object.keys(resp).map(k=>{
						$('#class-list').append('<a href="javascript:void(0)" data-json=\''+JSON.stringify(resp[k])+'\' data-id="'+resp[k].id+'" class="list-group-item list-group-item-action show-result">'+resp[k].class+' - <br>'+resp[k].subj+'</a>')
						})

					}
				}
			},
			complete:function(){
				end_load()
				anchor_func()
				if('<?php echo isset($_GET['rid']) ?>' == 1){
					$('.show-result[data-id="<?php echo isset($_GET['rid']) ? $_GET['rid'] : '' ?>"]').trigger('click')
				}else{
					$('.show-result').first().trigger('click')
				}
			}
		})
	}
	function anchor_func(){
		$('.show-result').click(function(){
			var vars = [], hash;
			var data = $(this).attr('data-json')
				data = JSON.parse(data)
			var _href = location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < _href.length; i++)
				{
					hash = _href[i].split('=');
					vars[hash[0]] = hash[1];
				}
			window.history.pushState({}, null, './index.php?page=result&rid='+data.id);
			load_report(<?php echo $faculty_id ?>,data.sid,data.id);
			$('#subjectField').text(data.subj)
			$('#classField').text(data.class)
			$('.show-result.active').removeClass('active')
			$(this).addClass('active')
		})
	}
	function load_report($faculty_id, $subject_id,$class_id){
		if($('#preloader2').length <= 0)
		start_load()
		$.ajax({
			url:'ajax.php?action=get_report',
			method:"POST",
			data:{faculty_id: $faculty_id,subject_id:$subject_id,class_id:$class_id},
			error:function(err){
				console.log(err)
				alert_toast("An Error Occured.","error");
				end_load()
			},
			success:function(resp){
				if(resp){
					resp = JSON.parse(resp)
					if(Object.keys(resp).length <= 0){
						$('.rates').text('')
						$('#tse').text('')
						$('#print-btn').hide()
					}else{
						$('#print-btn').show()
						$('#tse').text(resp.tse)
						$('.rates').text('-')
						var data = resp.data
						Object.keys(data).map(q=>{
							Object.keys(data[q]).map(r=>{
								console.log($('.rate_'+r+'_'+q),data[q][r])
								$('.rate_'+r+'_'+q).text(data[q][r]+'%')
							})
						})
					}
					
				}
			},
			complete:function(){
				end_load()
			}
		})
	}
	$('#print-btn').click(function(){
		start_load()
		var ns =$('noscript').clone()
		var content = $('#printable').html()
		ns.append(content)
		var nw = window.open("Report","_blank","width=900,height=700")
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)
	})
</script>