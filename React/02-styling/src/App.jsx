import './App.css'
import { Person } from './Person'
import { StudentList } from './StudentList'
import { NotPresentList } from './NotPresentList'
import { MixedList } from './MixedList'

function App() {
  return (
    <>
      <section className="layout">
        <StudentList>
          <Person firstname="Amin" lastname="El-Rifai" isPresent={true} />
        </StudentList>
        <NotPresentList></NotPresentList>
        <MixedList></MixedList>
      </section>
    </>
  )
}

export default App
