<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">

    <!-- Add Employees Information -->
    <div class="emp_form">
        <form class="app_form" method="POST" action="" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>اضافه موظف جديد</legend>

                <table>
                    <tr>
                        <td><label for="name">اسم الموظف :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" id="name" placeholder="ادخل اسم الموظف !" required="required"></td>
                    </tr>

                    <tr>
                        <td><label for="age">السن :</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="age" id="age" min="23" max="45" required="required"></td>
                    </tr>

                    <tr>
                        <td><label for="address">عنوان الموظف :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="address" id="address" placeholder="ادخل عنوان الموظف !" required="required"></td>
                    </tr>

                    <tr>
                        <td><label for="salary">الراتب :</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="salary" id="salary" step="0.01" min="1500" max="7000" required="required"></td>
                    </tr>

                    <tr>
                        <td><label for="tax">الضريبه :</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="tax" id="tax" step="0.01" min="1" max="5" required="required"></td>
                    </tr>

                    <tr>
                        <td><input type="submit" name="submit" value="اضافه"></td>
                    </tr>
                </table>
            </fieldset>

            <a href="/employees" class="btn btn-danger my-btn">الرجوع لقائمه الموظفين</a>

        </form>
    </div>

</div>