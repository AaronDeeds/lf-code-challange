<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <?php echo validation_errors(); ?>
      <?php if (isset($success) && $success == '1'): ?>
        <div class="alert alert-success" role="alert">Notification Request Submitted</div>
      <?php endif; ?>
      <div class="card mt-5">
        <div class="card-header text-center">
          <h4>Notification Form</h4>
        </div>
        <div class="card-body">
          <form action="/notification_form/" method="POST">
          <!-- <form action="/api/submit/" method="POST"> -->
            <div class="row">
              <div class="form-group col-md-6 col-xl-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?=set_value('first_name');?>">
              </div>
              <div class="form-group col-md-6 col-xl-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?=set_value('last_name');?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-xl-12 text-muted">
                How would you prefer to be notified?
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="checkbox" class="" id="email_notice" name="email_notice" value="1">
                    <label class="form-check-label" for="email_notice">Email</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="checkbox" class="" id="phone_notice" name="phone_notice" value="1">
                    <label class="form-check-label" for="phone_notice">Phone</label>
                  </div>
                </div>
                <div class="row mt-0">
                  <div class="form-group col-md-6 col-xl-6">
                    <input type="email" class="form-control" id="email" name="email" value="<?=set_value('email');?>" placeholder="Email Address">
                  </div>
                  <div class="form-group col-md-6 col-xl-6">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone');?>" placeholder="Phone Number">
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="form-group col-md-6">
                  <label for="supervisor_id">Supervisor</label>
                  <select class="form-control" id="supervisor_id" name="supervisor_id" required>
                    <option value="" selected="true" disabled>Select...</option>
                    <?php if (isset($supervisors) && is_array($supervisors)): ?>
                      <?php foreach ($supervisors as $key => $supervisor): ?>
                        <option value="<?=$supervisor->id?>"><?=$supervisor->lastName?>, <?=$supervisor->firstName?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>

                  </select>
                </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </div>


          </form>
        </div>
      </div>

    </div>

  </body>
</html>
