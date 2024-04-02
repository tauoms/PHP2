/**
 * Toggles the edit mode on a table row.
 *
 * @param {HTMLElement} row - The table row element.
 * @param {boolean} isEditing - A flag indicating whether to switch to edit mode.
 */
function toggleEditMode(row, isEditing) {
  // Retrieve the cells for username, password, and actions from the row
  const usernameCell = row.children[1];
  const passwordCell = row.children[2];
  const actionsCell = row.children[3];
  const editButton = actionsCell.children[0];
  const deleteButton = actionsCell.children[1];

  if (isEditing) {
    // Switch to edit mode: display input fields
    usernameCell.innerHTML = `<input type="text" value="${usernameCell.textContent}">`;
    passwordCell.innerHTML = `<input type="password" value="${passwordCell.getAttribute(
      'data-password'
    )}">`;
    // Change button labels to 'Save' and 'Cancel'
    editButton.textContent = 'Save';
    deleteButton.textContent = 'Cancel';
    // Set onclick handlers for saving changes and cancelling edit
    deleteButton.setAttribute(
      'onclick',
      'toggleEditMode(this.parentNode.parentNode, false)'
    );
    editButton.setAttribute(
      'onclick',
      'submitEdit(this.parentNode.parentNode)'
    );
  } else {
    // Revert to read mode: display text
    usernameCell.textContent = usernameCell.querySelector('input').value;
    passwordCell.textContent = '••••••••';
    passwordCell.removeAttribute('data-password');
    editButton.textContent = 'Edit';
    deleteButton.textContent = 'Delete';
    deleteButton.setAttribute(
      'onclick',
      `deleteRow(${row.getAttribute('data-id')})`
    );
    editButton.setAttribute(
      'onclick',
      'toggleEditMode(this.parentNode.parentNode, true)'
    );
  }
}

/**
 * Deletes a table row after confirmation.
 *
 * @param {number} id - The ID of the user to delete.
 */
function deleteRow(id) {
  if (confirm('Are you sure you want to delete?')) {
    const form = createForm('delete_id', id);
    document.body.appendChild(form);
    form.submit();
  }
}

/**
 * Submits the edited data for a table row.
 *
 * @param {HTMLElement} row - The table row element.
 */
function submitEdit(row) {
  const id = row.getAttribute('data-id');
  const username = row.children[1].querySelector('input').value;
  const password = row.children[2].querySelector('input').value;

  const form = createForm('edit_id', id);
  form.appendChild(createInput('edit_username', username));
  form.appendChild(createInput('edit_password', password));
  document.body.appendChild(form);
  form.submit();
}

/**
 * Creates a form element with a specified name and value.
 *
 * @param {string} name - The name attribute for the form's input element.
 * @param {string} value - The value attribute for the form's input element.
 * @returns {HTMLFormElement} The created form element.
 */
function createForm(name, value) {
  const form = document.createElement('form');
  form.method = 'post';
  form.style.display = 'none';
  form.appendChild(createInput(name, value));
  return form;
}

/**
 * Creates an input element with a specified name and value.
 *
 * @param {string} name - The name attribute for the input element.
 * @param {string} value - The value attribute for the input element.
 * @returns {HTMLInputElement} The created input element.
 */
function createInput(name, value) {
  const input = document.createElement('input');
  input.type = 'hidden';
  input.name = name;
  input.value = value;
  return input;
}
