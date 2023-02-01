<div class="container mt-4 mb-4">
    <div class="card p-4">
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" 
            value="<?php echo $_SESSION['data']['name'] ?? ""  ?>">
            <span style="color: red;"> <?php echo  $_SESSION['errors']["name"] ?? ""?></span>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" 
            value="<?php echo $_SESSION['data']['email'] ?? ""  ?>">
            <span style="color: red;">  <?php echo  $_SESSION['errors']["email"] ?? ""?></span>
        </div>
        <div class="mb-3 mt-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone"
            value="<?php echo $_SESSION['data']['phone'] ?? ""  ?>">
            <span style="color: red;">  <?php echo  $_SESSION['errors']["phone"] ?? ""?></span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"
            value="<?php echo $_SESSION['data']['password'] ?? ""  ?>">
            <span style="color: red;">  <?php echo  $_SESSION['errors']["password"] ?? ""?></span>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        <span style="color: green;">  <?php echo  $_SESSION['success'] ?? ""?></span>
       
    </form>
    </div>
</div>