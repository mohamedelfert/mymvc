<html>
    <head>
        <meta charset="UTF-8">
        <title> Show Employees Information</title>
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

            /* Start Show information */
            .main_div .show_info{
                margin: 0 auto;
                width: 59%;
            }
            .main_div .show_info fieldset{
                padding: 10px;
                background: #97d0f252;
                border: 1px solid #bfeff5;
                margin-bottom: 15px;
            }
            .main_div .show_info fieldset legend{
                padding: 5px;
                background: #a8dbef9e;
                border: 1px solid #84e0d7;
                color: #000;
            }
            .main_div .show_info fieldset table{
                width: 100%;
            }
            .main_div .show_info fieldset table thead th{
                font-weight: bold;
                text-align: center;
                padding: 5px;
                border-right: 2px solid #ccc;
                border-bottom: 2px solid #ccc;
            }
            .main_div .show_info fieldset table thead th:last-child{
                border-right: none;
            }
            .main_div .show_info fieldset table tbody td{
                text-align: center;
                padding: 5px;
                border-right: 2px solid #ccc;
                border-bottom: 2px solid #ccc;
            }
            .main_div .show_info fieldset table tbody td:last-child{
                border-right: none;
            }
            .main_div .show_info fieldset table tbody tr:nth-child(2n) td{
                background: #a7c4e285;
            }
            /* End Show information*/
        </style>
    </head>
    <body>
        <!-- The main Div contain Add Form And Show Information -->
        <div class="main_div">

            <?php
            if (isset($_SESSION['success'])){
                echo $_SESSION['success'];
            }else{
                echo @$_SESSION['error'];
            }
            session_unset();
            ?>
            <!-- Show Employees Information -->
            <div class="show_info">
                <fieldset>
                    <legend>Employees Information</legend>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Salary</th>
                                <th>Tax</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            /** @var TYPE_NAME $employees */
                            if ($employees !== false){
                                foreach ($employees as $employee){
                                    ?>
                                    <tr>
                                        <td><?= $employee->name ?></td>
                                        <td><?= $employee->age ?></td>
                                        <td><?= $employee->address ?></td>
                                        <td><?= $employee->calc_salary() ?></td>
                                        <td><?= $employee->tax ?></td>
                                        <td>
                                            <a href="/employees/edit/<?= $employee->id ?>">Edit</a>
                                            <a href="/employees/delete/<?= $employee->id ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                <td colspan="6"><p>Sorry No Employees In This List Now</p></td>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </fieldset>

                <a href="/employees/add">Add New Employee</a>

            </div>

        </div>
    </body>
</html>