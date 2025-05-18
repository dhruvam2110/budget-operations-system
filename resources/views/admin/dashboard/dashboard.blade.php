@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="layout-content">
    <div class="layout-content-body">
        <!-- Two Graphs -->
        <div class="row gutter-xs">

            <!-- Year v/s Budget Allocated Bar Graph -->

            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body text-center" data-toggle="match-height" style="height: 450px;">
                            <h4 class="text-center m-t-0">Budget Amount Chart</h4>
                            <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            @if($bud_pie != 0)
                                <canvas data-chart="bar" data-labels="[@foreach($budget_amount as $bud)&quot;{{$bud->year}}&quot;@if($bud->year < $bud->max('year')),@endif @endforeach]" data-values="[{&quot;backgroundColor&quot;: &quot;#@for($i = 0; $i < 6; $i++){{ substr(uniqid(),-1) }}@endfor&quot;, &quot;borderWidth&quot;: 1, &quot;label&quot;: &quot;Budget Allocated&quot;, &quot;data&quot;: [@foreach($budget_amount as $bud){{$bud->budget_allocated}} @if($bud->year < $bud->max('year')),@endif @endforeach]}]" data-show="[&quot;legend&quot;]" data-scales="{&quot;xAxes&quot;: [{ &quot;barPercentage&quot;: 0.3 }], &quot;yAxes&quot;: [{ &quot;ticks&quot;: { &quot;min&quot;: 0} }]}" height="395" width="790" style="display: block; width: 790px; height: 395px;"></canvas>
                            @else
                                <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Budget Allocated Pie Chart -->

            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body" data-toggle="match-height" style="height: 435px;">
                            <h4 class="text-center m-t-0">Budget Allocated Chart</h4>
                            <h6 class="text-center m-t-0">FY {{ $year }}</h6>
                            @if($empty != 0)
                                <h6 class="text-center m-t-0">Total Budget Allocated - {{ $budget_id->budget_allocated }}</h6>
                            @else
                                <h6 class="text-center m-t-0">Total Budget Allocated - 0</h6>
                            @endif
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-6">
                                    @if($empty != 0)
                                        <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                        <canvas data-chart="pie" data-labels="[@foreach($dep as $dep_name) &quot;{{$dep_name->dep->dep_code}}&quot;, @endforeach &quot;Not Allocated&quot;]" data-values="[{&quot;backgroundColor&quot;: [@foreach($dep as $dep_name) &quot;#@for($i = 0; $i < 6; $i++){{ substr(uniqid(),-1) }}@endfor&quot;, @endforeach &quot;#0000FF&quot;], &quot;data&quot;: [@foreach($dep as $dep_bud){{$dep_bud->budget_allocated}}, @endforeach {{ $total_budget_amt_not_allocated }}]}]" data-show="[&quot;scalesX&quot;, &quot;scalesY&quot;, &quot;legend&quot;]" height="380" width="380" style="display: block; width: 380px; height: 380px;"></canvas>
                                    @else
                                        <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Two Graphs -->
        <div class="row gutter-xs">

            <!-- Expenditure Pie Chart -->

            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body" data-toggle="match-height" style="height: 435px;">
                            <h4 class="text-center m-t-0 card-title">Expenditure Chart</h4>
                            <h6 class="text-center m-t-0">FY {{ $year }}</h6>
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-6">
                                     @if($empty != 0 && $expenditure_count != 0)
                                        <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                        <canvas data-chart="pie" data-labels="[@foreach($dep as $dep_name) &quot;{{$dep_name->dep->dep_code}}&quot;, @endforeach &quot;&quot;]" data-values="[{&quot;backgroundColor&quot;: [@foreach($dep as $dep_name) &quot;#@for($i = 0; $i < 6; $i++){{ substr(uniqid(),-1) }}@endfor&quot;, @endforeach &quot;#FFFFFF&quot;], &quot;data&quot;: [@foreach($dep as $dep_bud){{$dep_bud->budget_used}}, @endforeach 0]}]" data-show="[&quot;scalesX&quot;, &quot;scalesY&quot;, &quot;legend&quot;]" height="380" width="380" style="display: block; width: 380px; height: 380px;"></canvas>
                                    @else 
                                        <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Opex v/s Capex v/s Salary expense year wise line graph -->

            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body" data-toggle="match-height" style="height: 450px;">
                            <h4 class="text-center m-t-0">Detailed Expenditure Chart</h4>
                            <div class="row">
                                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                @if($empty != 0 || $expenditure_count != 0)
                                    <canvas data-chart="line"data-animation="false" data-labels="[@foreach($budget_amount as $bud)&quot;{{$bud->year}}&quot;,@endforeach &quot; &quot;]" data-values="[{&quot;label&quot;: &quot;Capex&quot;, &quot;backgroundColor&quot;: &quot;transparent&quot;, &quot;borderColor&quot;: &quot;#2c3e50&quot;, &quot;pointBackgroundColor&quot;: &quot;#2c3e50&quot;, &quot;data&quot;: [@foreach($capex_sum as $capex){{$capex}},@endforeach 0]}, {&quot;label&quot;: &quot;Opex&quot;, &quot;backgroundColor&quot;: &quot;transparent&quot;, &quot;borderColor&quot;: &quot;#e74c3c&quot;, &quot;pointBackgroundColor&quot;: &quot;#e74c3c&quot;, &quot;data&quot;: [@foreach($opex_sum as $opex){{$opex}},@endforeach 0]}, {&quot;label&quot;: &quot;Salary&quot;, &quot;backgroundColor&quot;: &quot;transparent&quot;, &quot;borderColor&quot;: &quot;#DEF012&quot;, &quot;pointBackgroundColor&quot;: &quot;#ddf00f&quot;, &quot;data&quot;: [@foreach($salary_sum as $salary){{$salary}},@endforeach 0]}]" data-tooltips="{&quot;mode&quot;: &quot;label&quot;}" data-show="[&quot;gridLinesX&quot;, &quot;legend&quot;]" height="395" width="790" style="display: block; width: 790px; height: 395px;"></canvas>
                                @else
                                    <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Two graphs -->
        <div class="row gutter-xs">
            <!-- Revenue Pie Chart -->
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body" data-toggle="match-height" style="height: 435px;">
                            <h4 class="text-center m-t-0">Sponsor Revenue Chart</h4>
                            <h6 class="text-center m-t-0">FY {{ $year }}</h6>
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-6">
                                    @if($rev != 0 && $sponsor_year_count != 0)
                                        <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                        <canvas data-chart="pie" data-labels="[@foreach($sponsor as $sponsor_name) &quot;{{$sponsor_name->sponsor_name}}&quot;, @endforeach &quot;&quot;]" data-values="[{&quot;backgroundColor&quot;: [@foreach($sponsor as $sponsor_name) &quot;#@for($i = 0; $i < 6; $i++){{ substr(uniqid(),-1) }}@endfor&quot;, @endforeach &quot;#FFFFFF&quot;], &quot;data&quot;: [@foreach($sponsor as $sponsor_revenue){{$sponsor_revenue->study_revenue}}, @endforeach 0]}]" data-show="[&quot;scalesX&quot;, &quot;scalesY&quot;, &quot;legend&quot;]" height="380" width="380" style="display: block; width: 380px; height: 380px;"></canvas>
                                    @else
                                        <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sponsor Revenue & Total Expenditure Comparison Graph -->
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-body text-center" data-toggle="match-height" style="height: 450px;">
                            <h4 class="text-center m-t-0">Sponsor Revenue & Total Expenditure Comparison Chart</h4>
                            <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            @if($empty != 0 || $expenditure_count != 0)
                                <canvas data-chart="horizontal-bar" data-labels="[@foreach($revenue_year as $rev_year)&quot;{{$rev_year->year}}&quot;@if($rev_year->year > $rev_year->min('year')),@endif @endforeach]" data-values="[{&quot;backgroundColor&quot;: &quot;#50b432&quot;, &quot;label&quot;: &quot;Revenue&quot;, &quot;data&quot;: [@foreach($revenue_sum as $revenue){{$revenue}},@endforeach 0]}, {&quot;backgroundColor&quot;: &quot;#058dc7&quot;, &quot;label&quot;: &quot;Expenditure&quot;, &quot;data&quot;: [@foreach($total_expense as $expense){{$expense}},@endforeach 0]}]" data-scales="{&quot;xAxes&quot;: [{ &quot;ticks&quot;: { &quot;beginAtZero&quot;: &quot;ture&quot; }}]}" data-show="[&quot;legend&quot;]" height="395" width="790" style="display: block; width: 790px; height: 395px;"></canvas>
                            @else
                                <center><h2 style="margin-top: 135px;">No Data to display!</h2></center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection