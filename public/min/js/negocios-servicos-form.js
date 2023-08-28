const form = $("#negociosServicos");

$("#enviarNegociosServicos").click(function () {
  form.valid();
});

// Mensagem de campo obrigatório
$.validator.messages = {
  required: "Preenchimento obrigatório.",
};

// ## Validações de campos radios+input text ## //

// Como nos encontrou input radios
$("input[name=howFindUS]").change(function () {
  const inputOtherChecked = $("#howFindUS10:checked").length > 0;
  const other = $("#other");

  inputOtherChecked
    ? other.removeAttr("disabled")
    : other.attr("disabled", true).val("");

  other.change((e) => {
    $("#howFindUS10").val(e.target.value);
  });
});
