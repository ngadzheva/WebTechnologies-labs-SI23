function Person(name, age) {
    this.name = name;
    this.age = age;

    this.greeting = () => console.log(`Hello, ${this.name}`);
}

const ivan = new Person('Ivan', 22);
ivan.name;
ivan.age;
ivan.greeting();
const hi = ivan.greeting;
hi();

const petkan = new Person('Petkan', 22);
ivan.greeting.call(petkan);

Person.prototype.info = function () {
    console.log(`${this.name}: ${this.age}`);
}

const dragan = new Person('Dragan', 22);
dragan.info = function () {
    console.log(`${this.age}, ${this.name}`);
}

dragan.info();
ivan.info();
petkan.info();

function Student(name, age, fn) {
    Person.call(this, name, age);

    this.fn = fn;

    let _mark;

    this.getMark = () => console.log(_mark);
    this.setMark = mark => _mark = mark;
}

Student.prototype = Object.create(Person.prototype);

const maria = new Student('Maria', 22, 666666);
maria.name;
maria.age;
maria.greeting();
maria.fn;
maria.setMark(6);
maria.getMark();
maria.info();

Student.prototype.studentInfo = function () {
    console.log(`${this.fn}: ${this.name}`);
};

maria.studentInfo();
ivan.studentInfo();