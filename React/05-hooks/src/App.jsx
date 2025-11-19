import './App.css';
import { StudentList } from './StudentList';
import { NotPresentList } from './NotPresentList';
import { MixedList } from './MixedList';
import { Error } from './Error';
import { InputForm } from './components/InputForm';

import { useStudents } from './hooks/useStudents';

import { useRef } from 'react';

function App() {
  const { error, presentList, absentList, addStudent, groupList, mixStudents } =
    useStudents();

  const isDarkMode = useRef(false);

  const toggleDarkMode = () => {
    isDarkMode.current = !isDarkMode.current
    console.log(isDarkMode.current);
    document.querySelector('.layout').classList.toggle('is-dark');
  };
  
  return (
    <>
      {error && <Error error={error} />}

      <button onClick={mixStudents} className="mix-btn">
        Mix
      </button>

      <button onClick={toggleDarkMode} className="dark-mode-btn">
        Toggle dark/lightmode
      </button>
      <InputForm addStudent={addStudent} />
      <section className={`layout ${isDarkMode.current === true ? "is-dark" : ""}`}>
        <StudentList>{presentList}</StudentList>
        <NotPresentList>{absentList}</NotPresentList>
        <MixedList bg="darkblue">{groupList}</MixedList>
      </section>
    </>
  );
}

export default App;