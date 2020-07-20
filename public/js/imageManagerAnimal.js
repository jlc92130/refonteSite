//var element = $('#imageOfAnimal');
var imgToDel = [];

$('#imageOfAnimal img').on('click',function(event){
    if($(this).hasClass("border-danger")){
        $(this).removeClass("border-danger");
        $(this).css("border","");
        //we look in the tab the position of id of selected image 
        var pos = imgToDel.indexOf(event.target.id);
        imgToDel.splice(pos,1);
    }
    else {
        $(this).addClass("border-danger");
        $(this).css("border","5px solid");
        imgToDel.push(event.target.id);
    }
    var listeImage ="";
    for(var i=0; i < imgToDel.length;i++){
        listeImage += imgToDel[i];
        if(i < imgToDel.length-1) listeImage += "-";
    }
    $('#imgToDelete').val(listeImage)
});
// we can choose the number of image clicking on the the arrows or input the number in the field(keyup) 
$('#nbImage').on('keyup click', function(event){
    var nbImage = $(this).val();
    var input = "";
    for (var i= 0; i < nbImage; i++) {
        input += "<input type='file' name='image"+i+"' id='image"+i+"' />  <br />";
    }
    $("#imageToAdd").html(input);
})