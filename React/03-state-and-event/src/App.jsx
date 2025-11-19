import { useState } from 'react'
import './App.css'
import { Person } from './Person'
import { StudentList } from './StudentList'
import { NotPresentList } from './NotPresentList'
import { MixedList } from './MixedList'
import shuffle from './utils/shuffle'
import chunk from './utils/chunk'
import { Group } from './Group'

function App() {

const [students, setStudents] = useState([
  { id: 1, firstname: "Rune", lastname: "Panda", isPresent: false, groupId: null },
  { id: 2, firstname: "Lena", lastname: "Hartmann", isPresent: false, groupId: null },
  { id: 3, firstname: "Marcus", lastname: "Osei", isPresent: true, groupId: null },
  { id: 4, firstname: "Sofia", lastname: "Reyes", isPresent: true, groupId: null },
  { id: 5, firstname: "Yuki", lastname: "Tanaka", isPresent: true, groupId: null },
  { id: 6, firstname: "Tariq", lastname: "Nasser", isPresent: true, groupId: null },
  { id: 7, firstname: "Amin", lastname: "El-Rifai", isPresent: true, groupId: null },
  ])

const [mixedStudents, setMixedStudents] = useState([]);

const presentStudents = students.filter(((student) => student.isPresent));
const absentStudents = students.filter(((student) => !student.isPresent));

const togglePresent = (id) => {
const newStudents = students.map((student) => {
  return id === student.id 
  ? {...student, isPresent: !student.isPresent}
  : student
})

setStudents(newStudents);
}

const mixStudents = () => {
  const mixedStudents = chunk(shuffle(presentStudents), 2);
  setMixedStudents(mixedStudents)
  console.log(mixedStudents);
}

  return (
    <>
      <button onClick={mixStudents} style={{display: "block"}}>Mix</button>
      <section className="layout">
        <StudentList>
          {
            presentStudents.map(student => (
              <Person onClickHandler={() => togglePresent(student.id)} key={student.id} {...student }/>
            ))
          }     
        </StudentList>
        <NotPresentList>
          {
            absentStudents.map(student => (
              <Person onClickHandler={() => togglePresent(student.id)} key={student.id} {...student }/>
            ))
          }              
        </NotPresentList>
        <MixedList bg="darkblue">
          { 
            mixedStudents.map((group) => (
              <Group>
               {group.map((student) => (
                    <Person key={student.id} {...student }/>
                  ))
                 } 
              </Group>
            ))
          }
        </MixedList>
      </section>
    </>
  )
}

export default App
