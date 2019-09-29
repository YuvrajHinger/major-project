<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';            
?>
<html>
    <head>
        <?php head(); ?>
    </head>
    <style>
    input[type=radio]
    {
        height :15px;
        width : 15px;
    }
    .que
    {
        border-size:5px;
    }
    </style>
    <body>
        <div class="page-container">
            <div class="left-content">
                <div class="mother-grid-inner">
                    <ol class="breadcrumb">
			            <center>
                            <li class="breadcrumb-item">
                                <h2><a href="">Quiz</a></h2>
                            </li>
                        </center>
		            </ol>      
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <div class="que">    
                                 <h2>1.Html Stands For</h2>
                                 </div> 
                                 <table width="100%" id="table" class="table table-bordered table-hover">
                                    <thead>
                                    <tbody>
                                        <tr>
                                        <td><input  type="radio" name="" value="" id=""/><label for="">A. Hyper Text Machine language</label></td>
                                        </tr>
                                        <tr>
                                        <td><input  type="radio" name="" value="" id=""/><label for="">B. Hyper Text Machine language</label></td>
                                        </tr>
                                        <tr>
                                        <td><input  type="radio" name="" value="" id=""/><label for="">C. Hyper Text Markup language</label></td>
                                        </tr>
                                        <tr>
                                        <td><input  type="radio" name="" value="" id=""/><label for="">D. Hyper Text Markup language</label></td>    
                                        </tr>
                                    </tbody>    
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-3">
                                <button type="submit" name="search" class="btn btn-success">Previous</button>
                                <button type="submit" name="reset" class="btn btn-success">Next</button>
                            </div>
                </div>
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>