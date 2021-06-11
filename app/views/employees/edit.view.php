<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">
    <!-- Add Employees Information -->
    <div class="container register">
        <div class="row">
            <div class="col-md-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">تعديل بيانات الموظف</h3>
                            <div class="row register-form" style="padding: 10% 5% 1% 5%;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">اسم الموظف :</label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required value="<?= $employees->name ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">عنوان الموظف :</label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Address *" name="address" id="address" required value="<?= $employees->address ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="age">السن :</label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="age" id="age" min="23" max="45" required value="<?= $employees->age ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="control-label col-sm-4" for="gender">النوع :</label>
                                            <label class="radio inline col-sm-2">
                                                <input type="radio" name="gender" id="gender" value="1" <?= $employees->gender == 1 ? 'checked' : '' ?> >
                                                <span> ذكر </span>
                                            </label>
                                            <label class="radio inline col-sm-2">
                                                <input type="radio" name="gender" id="gender" value="2" <?= $employees->gender == 2 ? 'checked' : '' ?> >
                                                <span> انثي </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="salary">الراتب :</label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="salary" id="salary" step="0.01" min="1500" max="7000" required value="<?= $employees->salary ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="tax">الضريبه :</label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="tax" id="tax" step="0.01" min="1" max="5" required value="<?= $employees->tax ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="shift">نظام العمل :</label>
                                        <label class="control-label col-sm-9">
                                            <select class="form-control" name="shift" id="shift">
                                                <option class="hidden" value="">  اختر نظام العمل</option>
                                                <option value="1" <?= $employees->shift == 1 ? 'selected' : '' ?> >دوام كامل</option>
                                                <option value="2" <?= $employees->shift == 2 ? 'selected' : '' ?> >دوام جزئي</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="control-label col-sm-12" for="systems">انظمه التشغيل التي يعمل عليها :</label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="windows" <?= $employees->shift == 'windows' ? 'checked' : '' ?> >
                                                <span> ويندوز </span>
                                            </label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="linux" <?= $employees->shift == 'linux' ? 'checked' : '' ?>>
                                                <span> لينوكس </span>
                                            </label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="mac" <?= $employees->shift == 'mac' ? 'checked' : '' ?>>
                                                <span> ماك </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="notes" for="notes" class="col-sm-3 control-label">ملاحظات :</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="notes" id="notes" for="notes" rows="5"><?= $employees->notes ?></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btnRegister" value="اضافه" style="width: 15%;margin: 5px auto;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>