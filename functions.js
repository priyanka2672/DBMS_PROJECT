//get atrribute to be modified

//get new value
function myfunc5()
{   
    var p = '<form method="POST"><div class="form-row"><div class="form-group col-md-6 myclass"><label>Enter the new value</label><input type="text" class="form-control" id="new_val" name="new_val" placeholder="New value"></div></div><button name="submit3"type="submit" class="btn" style="background-color:rgb(119, 32, 32)"onclick="myfunc6()">Submit</button><form> ';
    document.getElementById('artist_modify').innerHTML = p;    
}
//confirmation message
function myfunc6()
{
    alert("Record of has been modified");
}