const form = $("#cadastroForm");
const maxSteps = 3;
const minSteps = 0;
// Input controlador de passos;
let currentStep = $("#stepsControll").val("0");

currentStep.change(() => {
  handleSlots();
});

// Verifica qual é o passo atual do formulário e aplica ocultar/mostrar;
const handleSlots = () => {
  $(".step").map((item) => {
    const currentItem = $(".step")[item];

    if (item == currentStep.val()) {
      $(currentItem).removeClass("d-none");
    } else {
      $(currentItem).addClass("d-none");
    }
  });

  $(".register__step").map((item) => {
    const thisCurrentStep = $(".register__step")[item].children;

    if (item <= currentStep.val()) {
      $(thisCurrentStep).addClass("active");
    } else {
      $(thisCurrentStep).removeClass("active");
    }
  });
};

$("#nextStep").click((e) => {
  e.preventDefault();

  const isValidForm = form.valid();

  if (isValidForm) {
   
    if (currentStep.val() < maxSteps) {
      //console.log(submitForm());
      if(submitForm() == 'success'){
        currentStep.val(parseInt(currentStep.val()) + 1);
      }
    } 
    $("label.error").hide();
    handleSlots();
  }
});

$("#backStep").click((e) => {
  e.preventDefault();
  if (currentStep.val() >= minSteps + 1) {
    currentStep.val(parseInt(currentStep.val()) - 1);
  }

  handleSlots();
});

handleSlots();

// Mensagem de campo obrigatório;
$.validator.messages = {
  required: "Preenchimento obrigatório.",
};

// ## Validações de campos radios+input text ## //

// Como nos encontrou input radios;
$("input[name='pesquisa[ficou_sabendo]']").change(function () {
  const inputOtherChecked = $("#howFindUS10:checked").length > 0;
  const other = $("#other");

  inputOtherChecked
    ? other.removeAttr("disabled")
    : other.attr("disabled", true).val("");

  other.change((e) => {
    $("#howFindUS10").val(e.target.value);
  });
});

// Interesses input radio;
$("input[name='interesse[]']").change(function () {
  const inputEngeneringChecked = $("#interesting6:checked").length > 0;
  const engenering = $("#engenering");
  const inputOtherInterestingChecked = $("#interesting14:checked").length > 0;
  const otherInteresting = $("#otherInteresting");

  inputEngeneringChecked
    ? engenering.removeAttr("disabled")
    : engenering.attr("disabled", true).val("");

  engenering.change((e) => {
    $("#interesting6").val(e.target.value);
  });

  inputOtherInterestingChecked
    ? otherInteresting.removeAttr("disabled")
    : otherInteresting.attr("disabled", true).val("");

  otherInteresting.change((e) => {
    $("#interesting14").val(e.target.value);
  });
});
