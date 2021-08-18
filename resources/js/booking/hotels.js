
$(function(){
    if(document.getElementById('hotel_children') != null){
        document.getElementById('hotel_children').addEventListener('change', function() {
            var children = parseInt($('#hotel_children').val());

            const element = document.getElementById("hotel-search-child-ages");

            for (var i = 1; i <= 6; i++) {

                var createElement = true;
                const childElement = document.getElementById('child-age-div-'+i);

                if(children < i){
                    createElement = false;
                }

                if(createElement && childElement != null){
                    createElement = false;
                }

                if(createElement){
                    const newDiv = document.createElement('div');
                    newDiv.className = 'col-12 col-md-3 p-1';
                    newDiv.id = 'child-age-div-'+i;

                    const newLabel = document.createElement('label');
                    const newContent = document.createTextNode("Child " + i + " Age");
                    newLabel.appendChild(newContent);

                    newDiv.appendChild(newLabel);

                    const newInput = document.createElement('input');
                    newInput.className = 'form-control';
                    newInput.id = 'hotel-room-child-age-'+i;
                    newInput.name='child_age_'+i;
                    newInput.setAttribute("type", "number");
                    newInput.setAttribute("min", "0");
                    newInput.setAttribute("max", "17");
                    newInput.setAttribute("value", "0");
                    newInput.setAttribute("required", "");

                    newDiv.appendChild(newInput);

                    element.appendChild(newDiv);                
                }
                else if(children < i && childElement != null){
                    element.removeChild(childElement);
                }
            }
        });
    }


    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    var displayDateFormat = 'dd mmm yyyy';
    var duration = 2;
    var todayString = moment(today).format('DD MMM YYYY');
    var nextdayString = moment(today).add(duration, 'days').format('DD MMM YYYY');

    $('#hotel_checkin').datepicker({ 
        format: displayDateFormat ,
        minDate: today,
        // maxDate: function () {
        //     return $('#hotel_checkout').val();
        // },
        change: function () {
            computeNoNights();
        }
    });
    $('#hotel_checkin').val(todayString);

    $('#hotel_checkout').datepicker({ 
        format: displayDateFormat ,
        minDate: function () {
            return $('#hotel_checkin').val();
        },
        change : function () {
            computeNoNights();
        }
    });
    $('#hotel_checkout').val(nextdayString);
    $('#hotel_duration').val(duration);

    function computeNoNights() {
        var checkInMoment = null;
        var checkOutMoment = null;

        if($('#hotel_checkin').val() != null && $('#hotel_checkin').val() != ""){
            checkInMoment = moment(new Date($('#hotel_checkin').val()));
        }

        if($('#hotel_checkout').val() != null && $('#hotel_checkout').val() != ""){
            checkOutMoment = moment(new Date($('#hotel_checkout').val()));
        }

        if(checkInMoment != null && checkOutMoment != null)
        {
            if(checkInMoment >= checkOutMoment){
                duration = 1;
                $('#hotel_checkout').val(checkInMoment.add(duration, 'days').format('DD MMM YYYY'));
                $('#hotel_duration').val(duration);
            }
            else {
                duration = checkOutMoment.diff(checkInMoment, 'days');
                $('#hotel_duration').val(duration);
            }
        }
    }
});
