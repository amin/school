import { useState, useEffect, useMemo } from "react";
import shuffle from "../utils/shuffle"; // ✅ added
import chunk from "../utils/chunk"; // ✅ added
import { Person } from "../Person"; // ✅ added
import { Group } from "../Group"; // ✅ added

export const useStudents = () => {
  const [error, setError] = useState();
  const [students, setStudents] = useState([]);
  const [mixedStudents, setMixedStudents] = useState([]);

  const presentStudents = useMemo(() => {
    return students.filter((student) => student.isPresent);
  }, [students]);

  const absentStudents = useMemo(() => {
    return students.filter((student) => !student.isPresent);
  }, [students]);

  const togglePresent = (id) => {
    setStudents(
      students.map((student) =>
        student.id === id
          ? { ...student, isPresent: !student.isPresent }
          : student,
      ),
    );
  };

  useEffect(() => {
    fetch("./src/data/students.json")
      .then((response) => response.json())
      .then((json) => setStudents(json))
      .catch(() => setError("Could not load student data"))
  }, []);

  const mixStudents = () => {
    setMixedStudents(chunk(shuffle(presentStudents), 2));
  };

  const presentList = presentStudents.map((student) => (
    <Person
      key={student.id}
      onClickHandler={() => togglePresent(student.id)}
      {...student}
    />
  ));

  const absentList = absentStudents.map((student) => (
    <Person
      key={student.id}
      onClickHandler={() => togglePresent(student.id)}
      {...student}
    />
  ));

  const groupList = mixedStudents.map((group, index) => (
    <Group key={index}>
      {group.map((student) => (
        <Person key={student.id} {...student} />
      ))}
    </Group>
  ));

  const addStudent = ({firstName, lastName}) => {
    setStudents((prev) => {
      const newId = prev.reduce((max, s) => Math.max(max, s.id), 0) + 1;
      return [...prev, { 
        id: newId, 
        firstname: firstName, 
        lastname: lastName,
        isPresent: false, 
        groupId: null 
      }];
    });
  };

  return {
    error,
    presentList,
    absentList,
    addStudent,
    groupList,
    mixStudents,
  };
};
