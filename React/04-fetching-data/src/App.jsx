  import { useEffect, useState } from 'react';
  import './App.css';
  import LoadingSpinner from './assets/loading.svg?react';
  import { Person } from './Person';
  import { StudentList } from './StudentList';
  import { NotPresentList } from './NotPresentList';
  import { MixedList } from './MixedList';
  import { Group } from './Group';
  import { Error } from './Error';
  import shuffle from './utils/shuffle';
  import chunk from './utils/chunk';

  function App() {
    const [students, setStudents] = useState([]);
    const [isLoading, setLoading] = useState(true);
    const [error, setError] = useState();
    const [mixedStudents, setMixedStudents] = useState([]);

    const presentStudents = students.filter(student => student.isPresent);
    const absentStudents = students.filter(student => !student.isPresent);

    const togglePresent = (id) => {
      setStudents(students.map(student =>
        student.id === id ? { ...student, isPresent: !student.isPresent } : student
      ));
    };

    useEffect(() => {
      fetch('./src/data/students.json')
        .then(response => response.json())
        .then(json => setStudents(json))
        .catch(() => setError('Could not load student data'))
        .finally(() => setLoading(false));
    }, []);

    const mixStudents = () => {
      setMixedStudents(chunk(shuffle(presentStudents), 2));
    };

    const presentList = presentStudents.map(student => (
      <Person
        key={student.id}
        onClickHandler={() => togglePresent(student.id)}
        {...student}
      />
    ));

    const absentList = absentStudents.map(student => (
      <Person
        key={student.id}
        onClickHandler={() => togglePresent(student.id)}
        {...student}
      />
    ));

    const groupList = mixedStudents.map((group, index) => (
      <Group key={index}>
        {group.map(student => (
          <Person key={student.id} {...student} />
        ))}
      </Group>
    ));

    return (
      <>
        {isLoading && <LoadingSpinner />}
        {error && <Error error={error}/>}

        <button onClick={mixStudents} style={{ display: 'block' }}>Mix</button>

        <section className="layout">
          <StudentList>
            {!isLoading && presentList}
          </StudentList>

          <NotPresentList>
            {absentList}
          </NotPresentList>

          <MixedList bg="darkblue">
            {groupList}
          </MixedList>
        </section>
      </>
    );
  }

  export default App;