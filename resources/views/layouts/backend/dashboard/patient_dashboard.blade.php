@extends('layouts.backend.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-7 connectedSortable ui-sortable">

                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">Direct Chat</h3>
                        </div>

                        <div class="card-body">
                            <div class="card">


                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Note</th>
                                                <th>Days</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="3"> 8:30 pm</td>

                                                <td class="p-0">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="p-0">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td rowspan="3">Update software</td>
                                                <td class="p-0">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                        <tr>
                                                            <td>asd</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <form action="#" method="post">
                                footer
                            </form>
                        </div>

                    </div>




                </section>


                <section class="col-lg-5 connectedSortable ui-sortable">

                    <div class="card bg-gradient-success">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>

                        </div>

                        <div class="card-body pt-0">

                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Month"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Month">March 2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Month"></span></th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="02/27/2022"
                                                                    class="day old weekend">27</td>
                                                                <td data-action="selectDay" data-day="02/28/2022"
                                                                    class="day old">28</td>
                                                                <td data-action="selectDay" data-day="03/01/2022"
                                                                    class="day">1</td>
                                                                <td data-action="selectDay" data-day="03/02/2022"
                                                                    class="day">2</td>
                                                                <td data-action="selectDay" data-day="03/03/2022"
                                                                    class="day">3</td>
                                                                <td data-action="selectDay" data-day="03/04/2022"
                                                                    class="day">4</td>
                                                                <td data-action="selectDay" data-day="03/05/2022"
                                                                    class="day weekend">5</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="03/06/2022"
                                                                    class="day weekend">6</td>
                                                                <td data-action="selectDay" data-day="03/07/2022"
                                                                    class="day active today">7</td>
                                                                <td data-action="selectDay" data-day="03/08/2022"
                                                                    class="day">8</td>
                                                                <td data-action="selectDay" data-day="03/09/2022"
                                                                    class="day">9</td>
                                                                <td data-action="selectDay" data-day="03/10/2022"
                                                                    class="day">10</td>
                                                                <td data-action="selectDay" data-day="03/11/2022"
                                                                    class="day">11</td>
                                                                <td data-action="selectDay" data-day="03/12/2022"
                                                                    class="day weekend">12</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="03/13/2022"
                                                                    class="day weekend">13</td>
                                                                <td data-action="selectDay" data-day="03/14/2022"
                                                                    class="day">14</td>
                                                                <td data-action="selectDay" data-day="03/15/2022"
                                                                    class="day">15</td>
                                                                <td data-action="selectDay" data-day="03/16/2022"
                                                                    class="day">16</td>
                                                                <td data-action="selectDay" data-day="03/17/2022"
                                                                    class="day">17</td>
                                                                <td data-action="selectDay" data-day="03/18/2022"
                                                                    class="day">18</td>
                                                                <td data-action="selectDay" data-day="03/19/2022"
                                                                    class="day weekend">19</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="03/20/2022"
                                                                    class="day weekend">20</td>
                                                                <td data-action="selectDay" data-day="03/21/2022"
                                                                    class="day">21</td>
                                                                <td data-action="selectDay" data-day="03/22/2022"
                                                                    class="day">22</td>
                                                                <td data-action="selectDay" data-day="03/23/2022"
                                                                    class="day">23</td>
                                                                <td data-action="selectDay" data-day="03/24/2022"
                                                                    class="day">24</td>
                                                                <td data-action="selectDay" data-day="03/25/2022"
                                                                    class="day">25</td>
                                                                <td data-action="selectDay" data-day="03/26/2022"
                                                                    class="day weekend">26</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="03/27/2022"
                                                                    class="day weekend">27</td>
                                                                <td data-action="selectDay" data-day="03/28/2022"
                                                                    class="day">28</td>
                                                                <td data-action="selectDay" data-day="03/29/2022"
                                                                    class="day">29</td>
                                                                <td data-action="selectDay" data-day="03/30/2022"
                                                                    class="day">30</td>
                                                                <td data-action="selectDay" data-day="03/31/2022"
                                                                    class="day">31</td>
                                                                <td data-action="selectDay" data-day="04/01/2022"
                                                                    class="day new">1</td>
                                                                <td data-action="selectDay" data-day="04/02/2022"
                                                                    class="day new weekend">2</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="04/03/2022"
                                                                    class="day new weekend">3</td>
                                                                <td data-action="selectDay" data-day="04/04/2022"
                                                                    class="day new">4</td>
                                                                <td data-action="selectDay" data-day="04/05/2022"
                                                                    class="day new">5</td>
                                                                <td data-action="selectDay" data-day="04/06/2022"
                                                                    class="day new">6</td>
                                                                <td data-action="selectDay" data-day="04/07/2022"
                                                                    class="day new">7</td>
                                                                <td data-action="selectDay" data-day="04/08/2022"
                                                                    class="day new">8</td>
                                                                <td data-action="selectDay" data-day="04/09/2022"
                                                                    class="day new weekend">9</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Dec</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>

            </div>

        </div>
    </section>
@endsection
