<html>
    <head>
        <meta charset="UTF-8">
        <title> Edit Employee</title>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
            }
            body{
                font-family: "Bitstream Vera Sans Mono", "Courier New", Courier, monospace;
            }
            .main_div{
                margin: 5px;
                overflow: hidden;
            }

            /* Start Add information */
            .main_div .emp_form{
                width: 40%;
                margin: 0 auto;
            }
            .main_div .emp_form form.app_form fieldset{
                padding: 10px;
                background: #b7b4b42b;
                border: 1px solid #e3d8d8;
                margin-bottom: 15px;
            }
            .main_div .emp_form form.app_form fieldset legend{
                padding: 5px;
                background: #c0bcbc4f;
                border: 1px solid #e0e0e0;
                color: #000;
            }
            .main_div .emp_form form.app_form fieldset table{
                width: 100%;
            }
            .main_div .emp_form form.app_form fieldset table label{
                font-weight: bold;
            }
            .main_div .emp_form form.app_form fieldset table input[type=text],
            .main_div .emp_form form.app_form fieldset table input[type=number]{
                width: 100%;
                padding: 1% 1%;
                margin: 3px 0 7px 0;
            }
            .main_div .emp_form form.app_form fieldset table input[type=submit]{
                width: 30%;
                margin: 2% 35%;
                padding: 10px 5px;
                font-size: 15px;
                font-weight: bold;
                background: #bab0b345;
                border-radius: 20px;
            }
            /* End Add information*/

        </style>
    </head>
    <body>
        <!-- The main Div contain Add Form And Show Information -->
        <div class="main_div">

            <!-- Add Employees Information -->
            <div class="emp_form">
                <form class="app_form" method="POST" action="" enctype="application/x-www-form-urlencoded">
                    <fieldset>
                        <legend>Add Employee</legend>

                        <table>
                            <tr>
                                <td><label for="name">Employee Name :</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="name" id="name" placeholder="Write Your Name Here !" required="required" value="<?= $employees->name ?>"></td>
                            </tr>

                            <tr>
                                <td><label for="age">Employee Age :</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="age" id="age" min="23" max="45" required="required" value="<?= $employees->age ?>"></td>
                            </tr>

                            <tr>
                                <td><label for="address">Employee Address :</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="address" id="address" placeholder="Write Your Address Here !" required="required" value="<?= $employees->address ?>"></td>
                            </tr>

                            <tr>
                                <td><label for="salary">Employee Salary :</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="salary" id="salary" step="0.01" min="1500" max="7000" required="required" value="<?= $employees->salary ?>"></td>
                            </tr>

                            <tr>
                                <td><label for="tax">Employee Tax :</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="tax" id="tax" step="0.01" min="1" max="5" required="required" value="<?= $employees->tax ?>"></td>
                            </tr>

                            <tr>
                                <td><input type="submit" name="submit" value="Save"></td>
                            </tr>
                        </table>
                    </fieldset>

                    <a href="/employees">Return To Employees</a>

                </form>
            </div>

        </div>
    </body>
</html>