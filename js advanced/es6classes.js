class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    greeting()  {
        console.log(`Hello, ${this.name}`);
    }

    info() {
        console.log(`${this.name}: ${this.age}`);
    }
}

const ivan = new Person('Ivan', 22);
ivan.info = function () {
    console.log('Ivan info')
}

class Student extends Person {
    $mark;

    constructor(name, age, fn) {
        super(name, age);

        this.fn = fn;
    }

    getMark() {
        console.log(this.$mark);
    }

    setMark(mark) {
        this.$mark = mark;
    }

    studentInfo() {
        console.log(`${this.fn}: ${this.name}`);
    }
}

const maria = new Student('Maria', 22, 666666);
maria.setMark(6);
maria.getMark();
maria.studentInfo();