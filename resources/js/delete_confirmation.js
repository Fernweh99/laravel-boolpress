const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
  form.addEventListener('submit', event => {
    event.preventDefault();
    const hasConfirm = confirm('Sei sicuro di voler eliminare questo elemento?');
    if (hasConfirm) form.submit();
  });
})