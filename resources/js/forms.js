const $on = function(event, target, callback) {
    document.addEventListener(event, (e) => {
        const el = e.target.closest(target);
        if (el) {
            e.preventDefault();
            callback(el);
        }
    }, true);
}

const Forms = {
    validation() {

        const visited = [];

        $on('invalid', '.js-input', (el) => {
            setFieldValidity(el);
        })

        $on('input', '.js-input', (el) => {
            setFieldValidity(el);
        })



        for (const field of document.querySelectorAll('input')) {
            console.log(field)


            // field.addEventListener("invalid", function handleInvalidField(event) {
            //   setFieldValidity(field); // function-ified
            //   event.preventDefault();
            // });
          
            // ...
          
            // field.addEventListener("input", function handleFieldInput(event) {
            //   if (!visited.includes(field)) return;
            //   setFieldValidity(field); // here too
            // });
          }
          
          // ...
          
          // new
          function setFieldValidity(field) {
            console.log(field.validationMessage)

            if (!field.validity.valid) {
              //errorContainer(field).textContent = field.validationMessage;
              field.setAttribute("aria-invalid", "true");
              field.parentNode.querySelector('.js-error').innerHTML = field.validationMessage;
            } else {
              //errorContainer(field).textContent = "";
              field.removeAttribute("aria-invalid");
              field.parentNode.querySelector('.js-error').innerHTML = '';
            }
          }

        //   function errorContainer(field) {
        //     const errorContainerId = field
        //       .getAttribute("aria-describedby")
        //       .split(" ")
        //       .find((id) => id.includes("error"));
        //     return document.getElementById(errorContainerId);
        //   }
    }
}





export { Forms }
