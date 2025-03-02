document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#formContact");
    const reqs = document.querySelectorAll("input[required], textarea[required]");

    form.addEventListener("submit", e => {
        for (let req of reqs) {
            const fieldValue = req.value;
            let errorMessage = req.nextElementSibling;

            if (fieldValue == null || fieldValue == "") {
                e.preventDefault();

            req.classList.add("emptyField");

             //if no error message exists, create and append one
             if (!errorMessage || !errorMessage.classList.contains("error-message")) {
                errorMessage = document.createElement("div");
                errorMessage.textContent = "This field is required";
                errorMessage.style.color = "red";
                errorMessage.classList.add("error-message");

                req.insertAdjacentElement("afterend", errorMessage);
                
            }

        }

        //removes errors when user adds input
        req.addEventListener("input", () => {
            req.classList.remove("emptyField");
            
            if (req.nextElementSibling && req.nextElementSibling.classList.contains("error-message"))
                req.nextElementSibling.remove();
        })


        }
    })

    form.addEventListener("reset", () => {
        for (let req of reqs) {
            req.classList.remove("emptyField"); // Remove the red border

            // Remove any error message
            const errorMessage = req.nextElementSibling;
            if (errorMessage && errorMessage.classList.contains("error-message")) {
                errorMessage.remove();
            }
        }
    });


})