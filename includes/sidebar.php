<?php 

// require('dbconnection.php');
$con=mysqli_connect("localhost", "root", "", "cvmsdb");

$result = mysqli_query($con,"SELECT * FROM tblvisitor");

 ?>
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
        
                   <h1>Hostel Management</h1>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php"  style="color: blue">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

     <li>
                            <a href="visitors-form.php"  style="color: blue">
                                <i class="fa fa-user"></i>New Visitor</a>
                        </li>
                        
   <li>
                            <a href="manage-newvisitors.php"  style="color: blue">
                                <i class="fa fa-users"></i>Manage Visitors</a>
                        </li>

                        
                      <li>
                            <a href="bwdates-reports.php"  style="color: blue">
                                <i class="fas fa-copy"></i>Vistors B/w Dates</a>
                        </li>
                        
                        <li>  
                            <!-- <h1 id="screen" ></h1> -->
                         <div id="container"> </div></li>
                         <select name="years" >

                            <?php 
                          
                          while($row = $result->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $row['ID'];?>"><?php echo $row['FullName']; ?></option>
                              <?php
                            }
                            ?>   
                            </select> 
                    </ul>
                </nav>
            </div>
        </aside>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        select{
            margin: 10px 0px 0px 20px;
      
        }
        #green{
           color: green;
        }
        #red{
        color: red;
        }
        .green{
            background-color: green;
        }
        .red{
        background-color: red;
        }
        #btndesign{
            margin-top: 50px;
            cursor: pointer;
            padding: 3% 10%;
            font-size: xx-large;
            font-weight: bolder;
            border-radius: 50px;
            border: 2px solid green;
            
        }
        /* #btndesign:hover{
            background-color: purple;
            
        } */
        /* #screen{
            border: 1px solid rgb(17, 16, 16);
            height: 50px;
            text-align: center;
            width: 350px;
        } */
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- <h1 id="screen"></h1> -->
    <div id="container">
    <?php   
        $result=mysqli_query($con,"SELECT * from tblvisitor");
        if ($result->num_rows > 0)
        while($row = $result->fetch_assoc()) {
        $dd = $row["FullName"];
        // print_r($dd);
        }  
        ?><select name=<?= $dd ?>>

        <?php 
        foreach($dd as $name)
        // for($i=1; $i<=4; $i++)
        {
        
            echo "<option value=".$name.">".$name."</option>";
        }
        ?> 
             <option name=<?= $name ?>> </option>   
        </select> 
    </div>
</body>
</html>



<script>

    let btn=document.createElement("button");
    btn.setAttribute("id","btndesign")
    btn.addEventListener("click",showcount)
    btn.textContent="Status";
    var count=0;
    function showcount(){
    // var a= document.querySelector("h1");
      
        if(count===0){
            
            console.log(count++);
            //    a.textContent=count; 
            
            //    console.log(a);
            btn.setAttribute("class","green") ; 
            //    a.setAttribute("id","green") ; 
        }
        else {
            console.log(count--);
            //    a.textContent=count; 
            //    console.log(a);
            btn.setAttribute("class","red")
            //    a.setAttribute("id","red")
        }
        
       
      
    }

  var btndata = document.querySelector("#container")
 btndata.append(btn)

 $(document).ready(function(){

     $('#btndesign').on('click',function(){
         var val = $('select[name="years"]').val();
         console.log(val);
         $.ajax({
            type: "GET",
            url: "ajax.php?id="+val,
            //  data: "{count: " + count++ + "}",
           
            success: function(result){
                alert('Arriving Status Changed :)');
                location.reload();
             
            }
        });
     })
 })

</script>