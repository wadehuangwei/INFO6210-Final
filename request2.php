<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Request
    </title>

   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/request2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>
<body ng-app="">

<script src="js/request2.js"></script>
<div ng-include="'navBar.php'"></div>

<div class="container">
    <div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Conform Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Mobile Number</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputEmail1">Email address</label>
                                <div class="row">
                                    <div class="col-md-3 col-xs-3">
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                    <div class="col-md-9 col-xs-9">
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <div class="step_21">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <label class="radio-inline">
                                          <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> I am in INDIA
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <label class="radio-inline">
                                          <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> I am in ABROAD
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="step-22">
                                <h5><strong>How would you like to go Abroad ?</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Any How
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Migrate Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox">On a Migrate Visas
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Work Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Invest Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Travel Visas
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Assessment
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Other Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Dependent Visas
                                        </label>
                                    </div>
                                </div>
                                <h5><strong>Which country would you be interested in ?</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Anywhere Aboard
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Australia
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox">Canada
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Denmark
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> America
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> New Zealand
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Austria
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Norway
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> UK
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Hong Kong
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Singapore
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> France
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> South Africa
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Ireland
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Belgium
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Germany
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Philippines
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Netherlands
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Malaysia
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Switzerland
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Sweden
                                        </label>
                                    </div>
                                </div>
                                <h5><strong>How would you like to go Abroad ?</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> Any How
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Migrate Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox">On a Migrate Visas
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Work Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Invest Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Travel Visas
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Assessment
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Other Visas
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <label>
                                          <input type="checkbox"> On a Dependent Visas
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step33">
                        <h5><strong>Basic Details</strong></h5>
                        <hr>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Visa Status</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="visa_status" id="visa_status" class="dropselectsec">
                                        <option value="">Please Select Visa Status or Any Visa You Are Holding</option>
                                        <option value="2">Student Visas</option>
                                        <option value="1">Migrate Visas</option>
                                        <option value="4">Travel Visas</option>
                                        <option value="5">Work Visas</option>
                                        <option value="6">Other Visas</option>
                                        <option value="3">Settle Abroad</option>
                                        <option value="7">Invest Visas</option>
                                        <option value="8">Assessment</option>
                                        <option value="9">Dependent Visas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Date of birth</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Date</option>
                                                <option value="2">1</option>
                                                <option value="1">2</option>
                                                <option value="4">3</option>
                                                <option value="5">4</option>
                                                <option value="6">5</option>
                                                <option value="3">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Month</option>
                                                <option value="2">Jan</option>
                                                <option value="1">Feb</option>
                                                <option value="4">Mar</option>
                                                <option value="5">Apr</option>
                                                <option value="6">May</option>
                                                <option value="3">June</option>
                                                <option value="7">July</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sept</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-4 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Year</option>
                                                <option value="2">1990</option>
                                                <option value="1">1991</option>
                                                <option value="4">1992</option>
                                                <option value="5">1993</option>
                                                <option value="6">1994</option>
                                                <option value="3">1995</option>
                                                <option value="7">1996</option>
                                                <option value="8">1997</option>
                                                <option value="9">1998</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Marital Status</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Single
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Married
                                    </label>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Highest Education</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="highest_qualification" id="highest_qualification" class="dropselectsec">
                                        <option value=""> Select Highest Education</option>
                                        <option value="1">Ph.D</option>
                                        <option value="2">Masters Degree</option>
                                        <option value="3">PG Diploma</option>
                                        <option value="4">Bachelors Degree</option>
                                        <option value="5">Diploma</option>
                                        <option value="6">Intermediate / (10+2)</option>
                                        <option value="7">Secondary</option>
                                        <option value="8">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Specialization</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <input type="text" name="specialization" id="specialization" placeholder="Specialization" class="dropselectsec" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Year of Passed Out</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="year_of_passedout" id="year_of_passedout" class="birthdrop">
                                        <option value="">Year</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Total Experience</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Month</option>
                                                <option value="2">Jan</option>
                                                <option value="1">Feb</option>
                                                <option value="4">Mar</option>
                                                <option value="5">Apr</option>
                                                <option value="6">May</option>
                                                <option value="3">June</option>
                                                <option value="7">July</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sept</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-6 wdth">
                                            <select name="visa_status" id="visa_status" class="dropselectsec1">
                                                <option value="">Month</option>
                                                <option value="2">Jan</option>
                                                <option value="1">Feb</option>
                                                <option value="4">Mar</option>
                                                <option value="5">Apr</option>
                                                <option value="6">May</option>
                                                <option value="3">June</option>
                                                <option value="7">July</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sept</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mar_ned">
                                <div class="col-md-4 col-xs-3">
                                    <p align="right"><stong>Have you taken the IETLS Exam ?</stong></p>
                                </div>
                                <div class="col-md-8 col-xs-9">
                                    <select name="ielts" id="ielts" class="dropselectsec">
                                        <option value="">Select IETLS option</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                            <h5>Whats Next</h5>
                            <hr>
                            <div id="accordion-container">
                                <h2 class="accordion-header"> Your Assigned Branch Office & Consultant</h2>
                                <div class="accordion-content">
                                  <a href="#">
            Our Migrationideas consultant <strong>advisor </strong> will contact you shortly with the list of suggested products for you.<br>
                			<br><strong>Branch Office</strong><br>
				Hyderabad,<br>
                Suite 111, 1st Floor,<br>
                Babu Khan Mall, Opp Kalanikethan Wedding Mall,<br>
                Somajiguda,<br>                                                Hyderabad - 500 016,<br>
                Andhra Pradesh<br>
                Contact:  040 - 49596666,<br>

                E-Mail: hyderabad@migrationideas.com.<br>
          
       
<br>
        
        </a>
                                </div>
                                <h2 class="accordion-header"> Upload Resume</h2>
                                <div class="accordion-content">
                                  <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
<div ng-include="'footer.html'"></div>


</body>
</html>
