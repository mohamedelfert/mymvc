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
            <legend>معلومات الموظفين</legend>
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>السن</th>
                        <th>العنوان</th>
                        <th>الراتب</th>
                        <th>الضريبه</th>
                        <th>اداره</th>
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
                        <td colspan="6"><p>عفوا لا يوجد موظفين في القائمه حاليا !</p></td>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </fieldset>

        <a href="/employees/add" class="btn btn-success my-btn">اضافه موظف جديد</a>

    </div>

</div>