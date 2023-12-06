<?php
include "include/functions.php";
if( !isLogin() ) {
    header('location:index.php' );
}

$edit_lead = false;
if( isset($_GET['id']) && is_numeric( $_GET['id'] ) && $_GET['id'] > 0 ){
    $edit_lead = getLead( $_GET['id'] );
}

$leads = getAllLeads();
include "layout/header.php";
?>

    <header>
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item dropdown">
                <a class="nav-link" id="home-page" href="index.php">יצירת ליד <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="leads-mang" href="leads_panel.php">ניהול לידים</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="leads-mang" href="ajax/logout.php">התנתק</a>
            </li>
        </ul>
    </header>

    <div class="container mt-2">
        <div class="row mb-2 justify-content-center">
            <div class="col-xs-12">
                <h1 class="display-3">ניהול לידים</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-12 justify-content-center table-responsive">
                <table class="table table-bordered" id="table">
                    <thead class="table table-striped">
                    <tr>
                        <th scope="col" style="width: 100px;">שם מלא</th>
                        <th scope="col">אימייל</th>
                        <th scope="col">טלפון</th>
                        <th scope="col" style="width: 100px;">עיר</th>
                        <th scope="col">אני מאשר/ת קבלת דיוור ו/או חומר פרסומי ממכבי שירותי בריאות</th>
                        <th scope="col">אני חבר/ה מכבי</th>
                        <th scope="col">מחק</th>
                        <th scope="col">ערוך</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
                    if( sizeof( $leads ) > 0 ) {
                        foreach ($leads as $lead) { ?>
                            <tr>
                                <td><?php echo $lead['full_name']?></td>
                                <td><?php echo $lead['email']?></td>
                                <td><?php echo $lead['phone_number']?></td>
                                <td><?php echo $lead['city']?></td>
                                <td><?php if( $lead['check1'] === '1' ) { echo '<i class="fas fa-check"></i>'; } else { echo '<i class="fas fa-times"></i>';}?></td>
                                <td><?php if( $lead['check2'] === '1' ) { echo '<i class="fas fa-check"></i>'; } else { echo '<i class="fas fa-times"></i>';}?></td>
                                <td><a href="delete-lead.php?id=<?php echo $lead['id']; ?>"><i class="fas fa-trash"></i></a></td>
                                <td><a href="leads-panel.php?id=<?php echo $lead['id']; ?>"><i class="update-a fas fa-pencil-alt"></i></a></td>
                            </tr>
                            <?php
                        }
                    }else { 
                    ?>
                    <tr>
                        <td colspan="8" class="h5 text-center" style="color: black;">לא נמצאו לידים</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <section id="update-row">
                    <h4 class="text-center" style="color: black;">עדכון פרטי ליד</h4>
                    <div class="row justify-content-center">
                        <form action="leads-panel.php" id="updateLead">
                            <div class="col-xs-12">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-right">שם מלא</span>
                                    <input type="text" aria-label="Full name" class="form-control" value="<?php if( $edit_lead !== false ) { echo $edit_lead['full_name'];} ?>" id="update-fname-input">
                                    <div class="input-group-prepend">
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">אימייל</span>
                                    <input type="text" aria-label="email" class="form-control" value="<?php if( $edit_lead !== false ) { echo $edit_lead['email'];} ?>" id="update-email-input">
                                    <div class="input-group-prepend">
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">טלפון</span>
                                    <input type="text" aria-label="phone" class="form-control" value="<?php if( $edit_lead !== false ) { echo $edit_lead['phone_number'];} ?>" id="update-phone-input">
                                    <div class="input-group-prepend">
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">עיר</span>
                                    <input type="text" aria-label="city" class="form-control" value="<?php if( $edit_lead !== false ) { echo $edit_lead['city'];} ?>" id="update-city-input">
                                    <div class="input-group-prepend">
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="checkbox"
                                    disabled
                                    name="check1"
                                    aria-label="Checkbox for following text input"
                                    id="update-check1-input"
                                    <?php if( $edit_lead !== false && $edit_lead['check1'] == 1 ) { echo ' checked="checked"';} ?>>
                                    <label class="ml-1" for="check1">חבר/ה מכבי</label>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="checkbox"
                                        disabled
                                        name="check2"
                                        aria-label="Checkbox for following text input"
                                        id="update-check2-input"
                                        <?php if( $edit_lead !== false && $edit_lead['check2'] == 1 ) { echo ' checked="checked"';} ?>>
                                    <label class="ml-1 text-center" for="check2">קבלת דיוור ו/או חומר פרסומי</label>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xs-12 ">
                                        <button class="btn btn-primary justify-content-center" id="update-row-btn">עדכן</button>
                                        <input type="hidden" id="update-id-input" value="<?php echo $edit_lead['id'];?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php
include "layout/footer.php";

