<?php
include('../header.php');
include('../vdaemon/vdaemon.php');
include('../html_header.php');
?>
    <div class="container">
        <div class="dialog">
            <img src="../assets/images/MapCentia_500.png" id="logo">

            <form id="Register" action="p" method="POST" runat="vdaemon" disablebuttons="all">
                <div class="control-group">
                    <h3>Create database</h3>
                    <div class="alert alert-success" style="text-align: center">
                        Create a new PostGIS database. Choose between data centers located in US or EU (Availability Zones)
                    </div>

                    <div class="controls first">
                        <div style="height: 2em; float: right">
                            <vlsummary class="error" headertext="" displaymode="bulletlist">
                        </div>
                        <vllabel validators="UserID" errclass="error"
                                 errtext="<span class='label label-important'>User name required</span>" for="UserID"
                                 cerrclass="controlerror">
                            User name
                        </vllabel>
                        <vlvalidator name="UserID" type="required" control="UserID"/>
                        <vlvalidator name="UserIDExist" type="custom" control="UserID"
                                     errmsg="<span class='label label-important'>User name already exist</span>"
                                     function="UserIDCheck"/>
                        <input name="UserID" type="text" id="UserID"/>
                        <span class="help-inline"></span>
                    </div>

                    <div class="controls">

                        <vllabel errclass="error" validators="Email1,Email2" for="Email" cerrclass="controlerror"
                                 errtext="<span class='label label-important'>Hmm, that does not look like an email</span>">
                            Email
                        </vllabel>

                        <input name="Email" type="TEXT" class="control" id="Email" size="15">
                        <vlvalidator type="required" format="email" name="Email1" control="Email"/>
                        <vlvalidator type="format" format="email" name="Email2" control="Email"/>

                    </div>

                    <div class="controls">
                        <vllabel errclass="error" validators="Password" for="Password" cerrclass="controlerror"
                                 errtext="<span class='label label-important'>You must type a password</span>">
                            Password
                        </vllabel>
                        <input name="Password" type="password" class="control" id="Password" size="15"/>
                        <vlvalidator type="required" name="Password" control="Password"/>

                    </div>

                    <div class="controls">
                        <vllabel validators="Password,PassCmp" errclass="error" for="Password2" cerrclass="controlerror"
                                 errtext="<span class='label label-important'>Both Password fields must be equal</span>">
                            Confirm Password
                        </vllabel>
                        <input name="Password2" type="PASSWORD" class="control" id="Password2" size="15">
                        <vlvalidator name="PassCmp" type="compare" control="Password" comparecontrol="Password2"
                                     operator="e" validtype="string">
                    </div>
                    <?php if (\app\conf\App::$param['domain']) { ?>
                        <div class="controls">
                            Availability Zones
                            <label class="radio">
                                <input type="radio" name="Zone" value="us1" checked>
                                North America </label>
                            <label class="radio">
                                <input type="radio" name="Zone" value="eu1">
                                Europe </label>
                            <!--<label class="radio">
                                <input type="radio" name="Zone" value="local2">
                                Local </label>-->
                        </div>
                    <?php } ?>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn btn-info" value="Sign up">
                            <input type="reset" class="btn" value="Reset">
                        </div>
                    </div>
                    <div class="controls">
                        <label class="checkbox">
                            <input name="Agreement" type="checkbox" id="Agreement" value="1">
                            <vllabel errclass="error" validators="Agreement" for="Agreement"
                                     errtext="<span class='label label-important'>Agreement must be checked</span>">
                                I agree with the <a target="_blank" href="http://www.mapcentia.com/en/geocloud/geocloud.htm#terms">terms of service</a>
                            </vllabel>
                        </label>

                        <vlvalidator type="required" name="Agreement" control="Agreement">

                    </div>

                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php VDEnd(); ?>