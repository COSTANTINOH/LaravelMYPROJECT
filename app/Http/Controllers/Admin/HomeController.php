<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Branch;
use App\Task;
use DB;
use App\ULBD;
use App\Report;

class HomeController extends Controller
{
    public function index(){
         $user_num = User::all()->count();
        $dept_num = Department::all()->count();
        $branch_num = Branch::all()->count();


     $report_id = DB::table('tasks')->select(DB::raw('report_id'), DB::raw('count(*) as reports'))->where('date_task',date('Y-m-d'))->groupBy('report_id')->limit(3)->orderBy('reports', 'desc')->pluck('report_id');

       

        $sum_hours = Task::groupBy('date_task')->selectRaw('sum(time_taken) as sum')->pluck('sum');  

        $sum_count  = count ($sum_hours);
        
        $totals = [
            'ict' =>  ULBD::where('department_id',1)->count(),
            'finance' =>  ULBD::where('department_id',2)->count(),
            'saccos' =>  ULBD::where('department_id',3)->count(),
            'transport' =>  ULBD::where('department_id',4)->count(),
            'marketing' =>  ULBD::where('department_id',5)->count(),
            'hr' =>  ULBD::where('department_id',6)->count(),
            'default' =>  ULBD::where('department_id',7)->count(),
            'leader' =>  ULBD::where('department_id',8)->count(),
            // And so on
        ];
        // return $totals['ict'];

         $sum_people = DB::table('reports')->select(DB::raw('DATE(date) as date'), DB::raw('count(*) as reports'))->groupBy('date')->get();

         $people_count = count($sum_people);

                    
        // return view('hr.index',compact('user_num','dept_num','branch_num','totals','sum_hours','sum_count','sum_people','people_count'));
        // $sum_vijo = Task::groupBy('report_id')->selectRaw('report_id, sum(time_taken) as sum')->pluck('report_id');  
        // return $sum_vijo;

        
            // $ict = ULBD::select('user_id')->where('department_id',1)->pluck('user_id');
            // $finance = ULBD::select('user_id')->where('department_id',2)->pluck('user_id');
            // $saccos =  ULBD::select('user_id')->where('department_id',3)->pluck('user_id');
            // $transport =  ULBD::select('user_id')->where('department_id',4)->pluck('user_id');
            // $marketing =  ULBD::select('user_id')->where('department_id',5)->pluck('user_id');
            // $hr =  ULBD::select('user_id')->where('department_id',6)->pluck('user_id');
            // $default =  ULBD::select('user_id')->where('department_id',7)->pluck('user_id');
            // $leader =  ULBD::select('user_id')->where('department_id',8)->pluck('user_id');

            // $rep_id_ict = Report::select('id')->whereIn('user_id',$ict)->pluck('id');
            // $rep_id_finance = Report::select('id')->whereIn('user_id',$finance)->pluck('id');
            // $rep_id_saccos = Report::select('id')->whereIn('user_id',$saccos)->pluck('id');
            // $rep_id_trans = Report::select('id')->whereIn('user_id',$transport)->pluck('id');
            // $rep_id_market = Report::select('id')->whereIn('user_id',$marketing)->pluck('id');
            // $rep_id_hr = Report::select('id')->whereIn('user_id',$hr)->pluck('id');

            // if($rep_id_ict->isEmpty()){
            //     $task_ict = [];
            // }else{
            //     $task_ict = Task::select('time_taken')->where('report_id',$rep_id_ict)->pluck('time_taken');
            // }
            
            // if($rep_id_finance->isEmpty()){
            //     $task_finance = [];
            // }else{
            //     $task_finance = Task::select('time_taken')->where('report_id',$rep_id_finance)->pluck('time_taken');

            // }
    
            // if($rep_id_saccos->isEmpty()){
            //     $task_saccos = [];
            // }else{
            //     $task_saccos = Task::select('time_taken')->where('report_id',$rep_id_saccos)->pluck('time_taken');

            // }
            
            // if($rep_id_trans->isEmpty()){
            //     $task_trans = [];
            // }else{
            // $task_trans = Task::select('time_taken')->where('report_id',$rep_id_trans)->pluck('time_taken');

            // }

            // if($rep_id_market->isEmpty()){
            //     $task_market = [];
            // }else{
            // $task_market = Task::select('time_taken')->where('report_id',$rep_id_market)->pluck('time_taken');

            // }

            // if($rep_id_hr->isEmpty()){
            //     $task_hr = [];
            // }else{
            // $task_hr = Task::select('time_taken')->where('report_id',$rep_id_hr)->pluck('time_taken');

            // }

            // $xict = $xfin = $xmar = $xsac = $xtran = $xhr = 0;
            // $sum_ict = $sum_finance = $sum_saccos = $sum_trans = $sum_market = $sum_hr = 0;
            
            // $cict = count($task_ict);
            // $cfin = count($task_finance);
            // // return $cfin;
            // $cmar = count($task_market);
            // $ctran = count($task_trans);
            // $csac = count($task_saccos);
            // $chr = count($task_hr);

            // while($xict < $cict){
            //     $sum_ict += $task_ict[$xict];
            //     $xict++;
            // }
            // while($xfin < $cfin){
            //     $sum_finance += $task_finance[$xfin];
            //     $xfin++;
            // }
            // while($xsac < $csac){
            //     $sum_saccos += $task_saccos[$xsac];
            //     $xsac++;
            // }
            // while($xtran < $ctran){
            //     $sum_trans += $task_trans[$xtran];
            //     $xtran++;
            // }
            // while($xmar < $cmar){
            //     $sum_market += $task_market[$xmar];
            //     $xmar++;
            // }
            // while($xhr < $chr){
            //     $sum_hr += $task_hr[$xhr];
            //     $xhr++;
            // }

            // $sums = [
            //     'sum_ict' =>  $sum_ict,
            //     'sum_finance' =>   $sum_finance,
            //     'sum_saccos' =>  $sum_saccos,
            //     'sum_transport' =>   $sum_trans,
            //     'sum_marketing' =>   $sum_market,
            //     'sum_hr' =>   $sum_hr,
            //     // And so on
            // ];
            
            // return $sum;

//          <!-- <script>
// 	// window.onload = function () {

// 	var chart2 = new CanvasJS.Chart("chartContainer2", {
// 		animationEnabled: true,
// 		theme: "light1", // "light1", "light2", "dark1", "dark2"
// 		axisY: {
// 			title: "Hours(Spended)"
// 		},
// 		data: [{        
// 			type: "column",  
// 			showInLegend: true, 
// 			dataPoints: [      
// 				{ y: {{$sum_ict}}, label: "ICT" },
// 				{ y: {{$sum_finance}},  label: "Finance" },
// 				{ y: {{$sum_hr}},  label: "Human Resource" },
// 				{ y: {{$sum_trans}},  label: "Transportation" },
// 				{ y: {{$sum_saccos}},  label: "JATU SACCOS" },
// 				{ y: {{$sum_market}}, label:  "Marketing" },
// 			]
// 		}]
// 	});
// 	chart2.render();

// 	// }
// </script> -->
        
        
        //return view('hr.index',compact('user_num','dept_num','branch_num','totals'));
        return view('admin.index',compact('user_num','dept_num','branch_num','totals','sum_hours','sum_count','sum_people','people_count','report_id'));      
    }
}
