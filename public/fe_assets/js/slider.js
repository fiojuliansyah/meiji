// Requires jQuery

// Initialize slider:
$(document).ready(function () {
    $(".noUi-handle").on("click", function () {
        $(this).width(50);
    });
    var rangeSlider = document.getElementById("slider-range");
    var rangeSlider2 = $("#slider-range");
    if (rangeSlider2.length > 0) {
        var moneyFormat = wNumb({
            decimals: 0,
            thousand: ".",
            prefix: "",
        });
        noUiSlider.create(rangeSlider, {
            start: minSalary,
            animate: false,
            tooltips: true,
            step: 1,
            range: {
                min: minSalary,
                max: maxSalary,
            },
            format: moneyFormat,
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on("update", function (values, handle) {
            $(".min-value-money").val(values[0]);
            $(".max-value-money").val(values[1]);
            $(".min-value").val(moneyFormat.from(values[0])); // Nilai yang akan dikirim
            $(".max-value").val(moneyFormat.from(values[1])); // Nilai yang akan dikirim
        });
    }
});
