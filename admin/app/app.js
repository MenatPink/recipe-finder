$(document).ready(
    function(){
        console.log("Your finally into javascript. You can relax.")

        //****************************************************/
        //**************************************************/

        //STRENGTHENING PASSWORDS WITH STRENGTH.JS
        $('#reg-password').strength({
            strengthClass:'strength',
            stengthMeterClass:'strength_meter',
            stengthButtonClass:'button_strength',
            strengthButtonText:'Show password',
            strengthButtonTextToggle: 'Hide Password'
        });
    }
);