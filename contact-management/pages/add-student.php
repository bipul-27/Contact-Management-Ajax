<style>
.card {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}

.card h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Form input style */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
select:focus {
    outline: none;
    border-color: #6cb2eb;
    box-shadow: 0 0 5px rgba(108, 178, 235, 0.5);
}

/* Submit button style */
button {
    background-color: #4caf50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}
.display-success{
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
}
.display-failed{
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
}
</style>

<div class="card">
    <h2>
        <?php
        if(isset($action) && $action == "edit") {
            echo "Edit Contact";
        } elseif(isset($action) && $action == "view") {
            echo "View Contact";
        } else {
            echo "Add Contact";
        }
        ?>
    </h2>

    <?php if(!empty($displayMessage)) { ?>  
     <div class="display-success">
        <?php echo $displayMessage; ?>
    </div>
    <?php } ?>
    
    <form class="add-student-form" id="frm_sms_form"  method="post" action="javascript:void(0)">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" <?php if(isset($action) && $action == "view"){echo "readonly";}  ?> name="name" value="<?php if(isset($students['name'])){ echo $students['name']; } ?>" id="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" <?php if(isset($action) && $action == "view"){echo "readonly";}  ?> name="email" value="<?php if(isset($students['email'])){echo $students['email'];} ?>" id="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender"  id="gender" <?php if(isset($action) && $action == "view"){echo "disabled";} ?>>
                <option value="">Select Gender</option>
                <option <?php if(isset($students['gender']) && $students['gender'] == "male") {echo "selected";} ?> value="male">Male</option>
                <option <?php if(isset($students['gender']) && $students['gender'] == "female") {echo "selected";} ?> value="female">Female</option>
                <option <?php if(isset($students['gender']) && $students['gender'] == "other") {echo "selected";} ?> value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" <?php if(isset($action) && $action == "view"){echo "readonly";}  ?> name="phone" value="<?php if(isset($students['phone_no'])){echo $students['phone_no'];} ?>" id="phone" placeholder="Enter Phone" required>
        </div>
        <?php if(!isset($action) || $action != "view") { ?>
            <button type="submit" id="btn_sms_form" name="btn-submit">Submit</button>
        <?php } ?>
    </form>
</div>
