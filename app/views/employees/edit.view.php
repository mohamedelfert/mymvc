<!-- The main Div contain Add Form And Show Information -->
<div class="main_div">
    <!-- Add Employees Information -->
    <div class="container register">
        <div class="row">
            <div class="col-md-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <form class="app_form" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading"><?= @$text_employees_title ?></h3>
                            <div class="row register-form" style="padding: 10% 5% 1% 5%;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name"><?= @$text_employees_name ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required value="<?= $employees->name ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address"><?= @$text_employees_address ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="text" class="form-control" placeholder="Your Address *" name="address" id="address" required value="<?= $employees->address ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="age"><?= @$text_employees_age ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="age" id="age" min="23" max="45" required value="<?= $employees->age ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="control-label col-sm-4" for="gender"><?= @$text_employees_gender ?></label>
                                            <label class="radio inline col-sm-2">
                                                <input type="radio" name="gender" id="gender" value="1" <?= $employees->gender == 1 ? 'checked' : '' ?> >
                                                <span> <?= @$text_employees_gender_male ?> </span>
                                            </label>
                                            <label class="radio inline col-sm-2">
                                                <input type="radio" name="gender" id="gender" value="2" <?= $employees->gender == 2 ? 'checked' : '' ?> >
                                                <span> <?= @$text_employees_gender_female ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="salary"><?= @$text_employees_salary ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="salary" id="salary" step="0.01" min="1500" max="7000" required value="<?= $employees->salary ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="tax"><?= @$text_employees_tax ?></label>
                                        <label class="control-label col-sm-9">
                                            <input type="number" class="form-control" name="tax" id="tax" step="0.01" min="1" max="5" required value="<?= $employees->tax ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="shift"><?= @$text_employees_shift ?></label>
                                        <label class="control-label col-sm-9">
                                            <select class="form-control" name="shift" id="shift">
                                                <option class="hidden" value=""><?= @$text_employees_shift_def ?></option>
                                                <option value="1" <?= $employees->shift == 1 ? 'selected' : '' ?> ><?= @$text_employees_shift_full ?></option>
                                                <option value="2" <?= $employees->shift == 2 ? 'selected' : '' ?> ><?= @$text_employees_shift_part ?></option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="control-label col-sm-12" for="systems"><?= @$text_employees_systems ?></label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="windows" <?= (@in_array('windows',$employees->systems) ? 'checked' : '') ?> >
                                                <span> <?= @$text_employees_systems_win ?> </span>
                                            </label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="linux" <?= (@in_array('linux',$employees->systems) ? 'checked' : '') ?>>
                                                <span> <?= @$text_employees_systems_linux ?> </span>
                                            </label>
                                            <label class="radio inline col-sm-3">
                                                <input type="checkbox" name="systems[]" id="systems" value="mac" <?= (@in_array('mac',$employees->systems) ? 'checked' : '') ?>>
                                                <span> <?= @$text_employees_systems_mac ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="notes" for="notes" class="col-sm-3 control-label"><?= @$text_employees_notes ?></label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="notes" id="notes" for="notes" rows="5"><?= $employees->notes ?></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btnRegister" value="<?= @$text_employees_edit ?>" style="width: 15%;margin: 5px auto;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>