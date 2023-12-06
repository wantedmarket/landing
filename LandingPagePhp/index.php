<?php
include "include/functions.php";

    $LoggedIn = isLogin();

include "layout/header.php";
?>
    <header>
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item dropdown">
                <a class="nav-link active" id="home-page" href="#">יצירת ליד <span class="sr-only">(current)</span></a>
                <?php if( $LoggedIn ) { echo '<li class="nav-item"><a class="nav-link" id="leads-mang" href="ajax/logout.php">התנתק</a></li>'; } else { echo '';}?>
                <li class="nav-item dropdown login-item" <?php if( $LoggedIn ) { echo 'hidden'; } else { echo '';}?>>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    התחברות
                </a>
                <form class="dropdown-menu p-4" id="loginForm" name="loginForm">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail2">אימייל</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" name="email-login-input" placeholder="אימייל" style="width: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword2">סיסמא</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword2" name="password-login-input" placeholder="סיסמא">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label pr-4" for="exampleCheck3">זכור אותי</label>
                            <input type="checkbox" name="check2" class="form-check-input" id="exampleCheck3">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="loginBtn" id="loginBtn">התחבר</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="leads-mang" href="leads-panel.php">ניהול לידים</a>
            </li>
        </ul>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <img src="images/header.jpg" class="rounded mx-auto d-block header-web-img" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <dl class="row m-0 text-left">
                    <dt class="col-sm-1"></dt>
                    <dd class="col-sm-9">
                        <var class="h5 font-weight-bold">דפי אורז ממולאים בסלק וגבינת פטה</var>
                        <br>
                    <dt class="col"><p>של <var class="h5 font-weight-bold">אניה רויטפלד</var> דיאטנית במחוז השרון</p>
                    </dt>
                    </dd>
                </dl>
                <br>
                <h6>מצרכים ל - 4 מנות</h6>
                <p class="h6">
                    סלקים גדולים מבושלים וחתוכים לקוביות או מגורדים
                    <br>
                    150 גרם גבינת פטה פיראוס 5% חתוכה לקוביות
                    <br>
                    40 גרם אגוזי מלך קצוצים / צנוברים
                    <br>
                    8 דפי אורז
                </p>
                <br>
                <h6>אופן ההכנה</h6>
                <p class="h6">
                    . מערבבים את המלית (סלקתפטה ואגוזים)*
                    <br>
                    .טובלים את דפי האורז במים ומייבשים על מגבת מטבח*
                    <br>
                    .מניחים במרכז כל דף 1-2 כפיות מהמלית*
                    <br>
                    .מגלגלים את הדפים (כמו בלינצ'ס)*
                    <br>
                    ...מגישים עם רוטב לבחירה - סויה, טריקאית צ'לי*
                    <br>
                </p>
                <br>
                <h6>ערכים תזונתיים למנה</h6>
                <p class="h6">
                    55 קלוריות | 10 גרם פחמימות | 9 גרם שומן
                    <br>
                    680 גרם נתרן | 1 גרם סיבים
                </p>
                <h4 class="text-right" style="color: rgb(18, 62, 158);"><strong>בתאבון!</strong></h4>
            </div>
            <div class="col-sm recipe-img">
                <img src="images/pic.jpg" class="rounded mx-auto d-block" alt="">
            </div>
        </div>
        <div class="row justify-content-center form-container">
            <div class="col-xs-12">
                <h4 style="color: white;">רוצים עוד מתכונים בריאים לשבועות?</h4>
                <p class="h6" style="color: white;">לקבלת חוברת המתכונים הדיגיטלית שלנו השאירו פרטים </p>
                <form name="leadForm" id="leadForm">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="fullName" class="form-control" id="fullname-input" placeholder="שם מלא" aria-label="name" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback">
                            אנא הקלד שם מלא
                            </div>
                        </div>
                        <div class="col">
                            <input type="email" name="email" class="form-control" id="email-input" placeholder="אימייל" aria-label="email" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback">
                            אנא הקלד אימייל
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="city" class="form-control" id="city-input" placeholder="עיר" aria-label="city" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback">
                            אנא הקלד עיר
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" name="phone" class="form-control" id="phone-number-input" placeholder="טלפון" aria-label="phone" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback">
                           אנא הקלד מספר טלפון
                        </div>
                        </div>
                    </div>

                    <div class="form-check mt-1">
                        <input type="checkbox" name="check1" class="form-check-input ml-2" id="check1-input">
                        <label class="form-check-label pl-4" for="check1-input" style="color: white;">אני חבר/ה מכבי</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="check2" class="form-check-input ml-2" id="check2-input">
                        <label class="form-check-label pl-4" for="check2-input" style="color: white;">אני מאשר/ת קבלת דיוור ו/או חומר פרסומי ממכבי שירותי בריאות</label>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-lg btn-block submit-btn mt-2 mb-2" id="leadBtn">שלחו לי את החוברת</button>
                </form>
            </div>
        </div>
        <div class="container data-recived mt-3" style="background-color: rgb(18, 62, 158);">
            <div class="row justify-content-center data-recived pt-2">
                <div class="col-xs-12">
                    <img src="images/v.png" class="img-fluid" id="data-recived-v" alt="Thank you">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-12">
                    <h2 style="color: white;">תודה פנייתך התקבלה</h2>
                    <h4 style="color: white;">!החוברת תשלח אליך בהקדם</h4>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row footer-image v-100">
            <div class="col">
                <div class="position-relative footer-logo">
                    <img src="images/logo.png" alt="">
                </div>
            </div>
        </div>
    </footer>
<?php
include "layout/footer.php";