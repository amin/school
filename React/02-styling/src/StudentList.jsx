import styles from './StudentList.module.css';

export const StudentList = ({children}) => {
    return (
        <div className="studentList border-4 border-indigo-600">
            <h1 className={styles.h1}>Studentlist</h1>
            <div className="border-2 border-indigo-400">
                { children }
            </div>
        </div>
    )
}