<section id="checkout-personal-information-step" class="checkout-step -current -reachable js-current-step">
    <h1 class="step-title h3">
        <i class="material-icons done"></i>
        <span class="step-number">1</span>
        Личные данные
        <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> edit</span>
    </h1>

    <div class="content">


        <ul class="nav nav-inline m-y-2">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#checkout-guest-form" role="tab">
                    Гостевой заказ
                </a>
            </li>

            <li class="nav-item">
                <span href="nav-separator"> | </span>
            </li>

            <li class="nav-item">
                <a class="nav-link " data-link-action="show-login-form" data-toggle="tab" href="#checkout-login-form"
                   role="tab">
                    Войти
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="checkout-guest-form" role="tabpanel">


                <form action="http://localhost/prestashop/ru/order" id="customer-form" class="js-customer-form"
                      method="post">
                    <section>


                        <input type="hidden" name="id_customer" value="">


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label">
                                Форма обращения
                            </label>
                            <div class="col-md-6 form-control-valign">


                                <label class="radio-inline">
            <span class="custom-radio">
              <input name="id_gender" type="radio" value="1">
              <span></span>
            </span>
                                    Г-н
                                </label>
                                <label class="radio-inline">
            <span class="custom-radio">
              <input name="id_gender" type="radio" value="2">
              <span></span>
            </span>
                                    Г-жа
                                </label>


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label required">
                                Имя
                            </label>
                            <div class="col-md-6">


                                <input class="form-control" name="firstname" type="text" value="" required="">


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label required">
                                Фамилия
                            </label>
                            <div class="col-md-6">


                                <input class="form-control" name="lastname" type="text" value="" required="">


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label required">
                                E-mail
                            </label>
                            <div class="col-md-6">


                                <input class="form-control" name="email" type="email" value="" required="">


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <p>
                            <span class="font-weight-bold">Создание учетной записи</span> <span class="font-italic">(необязательно)</span>
                            <br>
                            <span class="text-muted">И сэкономьте свё время в следующий раз!</span>
                        </p>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label">
                                Пароль
                            </label>
                            <div class="col-md-6">


                                <div class="input-group js-parent-focus">
                                    <input class="form-control js-child-focus js-visible-password" name="password"
                                           type="password" value="" pattern=".{5,}">
                                    <span class="input-group-btn">
            <button class="btn" type="button" data-action="show-password" data-text-show="Показать"
                    data-text-hide="Скрыть">
              Показать
            </button>
          </span>
                                </div>


                            </div>

                            <div class="col-md-3 form-control-comment">
                                Необязательно
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label">
                                Дата рождения
                            </label>
                            <div class="col-md-6">


                                <input class="form-control" name="birthday" type="text" value=""
                                       placeholder="YYYY-MM-DD">
                                <span class="form-control-comment">
            (Например: 1970-05-31)
          </span>


                            </div>

                            <div class="col-md-3 form-control-comment">
                                Необязательно
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label">
                            </label>
                            <div class="col-md-6">

      
        <span class="custom-checkbox">
          <input name="optin" type="checkbox" value="1">
          <span><i class="material-icons checkbox-checked"></i></span>
          <label>Получать предложения наших партнёров</label>
        </span>


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label">
                            </label>
                            <div class="col-md-6">

      
        <span class="custom-checkbox">
          <input name="newsletter" type="checkbox" value="1">
          <span><i class="material-icons checkbox-checked"></i></span>
          <label>Подписка на нашу рассылку <br><em>Вы можете отписаться в любой момент. Для этого воспользуйтесь нашими контактными данными в юридическом уведомлении.</em></label>
        </span>


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                    </section>

                    <footer class="form-footer clearfix">
                        <input type="hidden" name="submitCreate" value="1">

                        <button class="continue btn btn-primary pull-xs-right" name="continue"
                                data-link-action="register-new-customer" type="submit" value="1">
                            Продолжить
                        </button>

                    </footer>

                </form>

            </div>
            <div class="tab-pane " id="checkout-login-form" role="tabpanel">


                <form id="login-form" action="http://localhost/prestashop/ru/order" method="post">

                    <section>


                        <input type="hidden" name="back" value="">


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label required">
                                E-mail
                            </label>
                            <div class="col-md-6">


                                <input class="form-control" name="email" type="email" value="" required="">


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label class="col-md-3 form-control-label required">
                                Пароль
                            </label>
                            <div class="col-md-6">


                                <div class="input-group js-parent-focus">
                                    <input class="form-control js-child-focus js-visible-password" name="password"
                                           type="password" value="" pattern=".{5,}" required="">
                                    <span class="input-group-btn">
            <button class="btn" type="button" data-action="show-password" data-text-show="Показать"
                    data-text-hide="Скрыть">
              Показать
            </button>
          </span>
                                </div>


                            </div>

                            <div class="col-md-3 form-control-comment">
                            </div>
                        </div>


                        <div class="forgot-password">
                            <a href="http://localhost/prestashop/ru/password-recovery" rel="nofollow">
                                Забыли пароль?
                            </a>
                        </div>
                    </section>

                    <footer class="form-footer text-xs-center clearfix">
                        <input type="hidden" name="submitLogin" value="1">

                        <button class="continue btn btn-primary pull-xs-right" name="continue"
                                data-link-action="sign-in" type="submit" value="1">
                            Продолжить
                        </button>

                    </footer>
                </form>

            </div>
        </div>


    </div>
</section>