<!-- The main Div contain Add Form And Show Information -->
<div class="main_div col-lg-12">

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
            <legend><?= @$text_employees_title ?></legend>
            <table class="table table-striped custab data">
                <thead>
                    <tr>
                        <th><?= @$text_employees_name ?></th>
                        <th><?= @$text_employees_age ?></th>
                        <th><?= @$text_employees_address ?></th>
                        <th><?= @$text_employees_salary ?></th>
                        <th><?= @$text_employees_tax ?></th>
                        <th><?= @$text_employees_options ?></th>
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
                                    <a href="/employees/edit/<?= $employee->id ?>"><i class="fa fa-edit"></i></a>
                                    <a href="/employees/delete/<?= $employee->id ?>" onclick="if (!confirm('Doy You Want To Delete This Employee ?')) return false"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <td colspan="6"><p><?= @$text_employees_no_employees ?></p></td>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </fieldset>

        <a href="/employees/add" class="btn btn-success my-btn"><?= @$text_employees_add_new_employees ?></a>

    </div>

</div>