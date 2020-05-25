function deleteCar(id) {
    $.ajax({
        url:`delete.php?id=${id}`,
        type:'GET',
//        data:{'id':id},
        success: function(data){
            if(data){
                $(`#${id}`).remove();
            }else{
                alert("Can't delete this car")
            }
        }

    });
}

function deleteImg(id, carId) {
    $.ajax({
        url:`deleteImg.php?id=${id}&car_id=${carId}`,
        type:'GET',
        success: function(data){  
            if(data){
               $(`#${id}1`).remove();

            }else{
                alert("Can't delete this car");
            }
    
        }
    });
}

function changeAvatar(id, carId){
    $.ajax({
        url:`changeAvatar.php?id=${id}&car_id=${carId}`,
        type:'GET',
        success: function(data){    
            if(data){
               // success
            }else{
                alert("Can't change avatar this car");
            }   
        }
    });
}