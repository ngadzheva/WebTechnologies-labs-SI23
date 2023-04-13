window.onload = function () {
    console.log('Page loaded')
}

(function () {
    console.log('Hello, world')

    const studentsHeader = document.getElementsByTagName('header')[0];
    console.log(studentsHeader);
    studentsHeader.innerHTML += ' Marks';

    const headerRow = document.getElementById('header-row');
    console.log(headerRow)

    const th = document.createElement('th');
    th.innerHTML = 'Action';

    headerRow.appendChild(th);

    const markTh = document.createElement('th');
    const markContent = document.createTextNode('Mark');
    markTh.appendChild(markContent);

    th.before(markTh);

    const fnTd = document.getElementById('fn');
    const td = document.createElement('td');
    td.innerHTML = '6';

    fnTd.after(td);

    const students = document.getElementsByClassName('student');
    console.log(students)

    const deleteTd = document.querySelector('#delete');
    const deleteButton = deleteTd.children[0];

    deleteButton.addEventListener('click', deleteStudent);

    const addButton = document.querySelector('[type="submit"]');
    addButton.addEventListener('click', function(event) {
        event.preventDefault();
        console.log(event)
        addStudent();
    });

    const studentRow = document.getElementsByClassName('student')[0];
    studentRow.addEventListener('mouseover', function(event) {
        event.target.style.backgroundColor = '#ccc';
    })
}());

function deleteStudent(event) {
    const studentToDelete = event.target.parentElement.parentElement;

    studentToDelete.parentElement.removeChild(studentToDelete);
}

function addStudent() {
    const firstName = document.getElementsByName('first-name')[0];
    const lastName = document.getElementsByName('last-name')[0];
    const fn = document.getElementsByName('fn')[0];
    const mark = document.getElementsByName('mark')[0];

    const student = {
        firstName: firstName.value,
        lastName: lastName.value,
        fn: fn.value,
        mark: mark.value
    };

    appendTable(student);

    firstName.value = '';
    lastName.value = '';
    fn.value = '';
    mark.value = '';
}

function appendTable(student) {
    const tableBody = document.getElementsByTagName('tbody')[0];

    const firstNameTd = document.createElement('td');
    firstNameTd.innerHTML = student.firstName;

    const lastNameTd = document.createElement('td');
    lastNameTd.innerHTML = student.lastName;
    
    const fnTd = document.createElement('td');
    fnTd.innerHTML = student.fn;

    const markTd = document.createElement('td');
    markTd.innerHTML = student.mark;

    const deleteTd = document.createElement('td');
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = 'Delete';
    deleteButton.addEventListener('click', deleteStudent);
    deleteTd.append(deleteButton);

    const studentRow = document.createElement('tr');
    studentRow.setAttribute('class', 'student');

    studentRow.append(firstNameTd, lastNameTd, fnTd, markTd, deleteTd);

    tableBody.appendChild(studentRow);
}