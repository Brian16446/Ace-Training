
// Date Reigstered
$(function() {
    $( "#dob" ).datepicker({
        
        inline: true,
        dateFormat: 'dd/mm/yy',
        changeYear: true,
        yearRange: '1913:2008',
    });
});

// Date of birth
$(function() {
    $( "#registerDate" ).datepicker({
        
        dateFormat: 'dd/mm/yy',
    });
});