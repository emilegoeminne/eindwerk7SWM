function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.querySelector(".hamburger-icon").style.display = "none";
  }
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".hamburger-icon").style.display = "inherit";
  }

  document.getElementById("btnCloseNav").addEventListener("click", function(event){
    event.preventDefault();
    closeNav();
  });
  document.getElementById("btnOpenNav").addEventListener("click", function(event){
    openNav();
  });

  $(document).ready(function(){
    $("#remove").on('click',function(){
        var toRemove=$('#toRemove').val();
        $.ajax('goToRemove.php',{
            data:{"toRemove":toRemove}
        });


    });
});
$(document).ready(function(){
    $('.plus-btn').on('click', function(e) {

        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 100) {
            value = value + 1;
            console.log("Ik wil dood zo veel keer");
            console.log(value);
        } else {
            value =100;
        }

        $input.val(value);
    });
});
$(document).ready(function(){
    $('.minus-btn').on('click', function(e) {
        console.log("Test Text");
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 100) {
            value = value - 1;
        } else {
            value =100;
        }

        $input.val(value);
    });
});
$(document).ready(function(){
    // image gallery
    // init the state from the input
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        }
        else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))

        e.preventDefault();
    });
});