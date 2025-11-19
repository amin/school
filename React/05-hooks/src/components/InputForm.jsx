import { useRef, useState } from 'react'

export function InputForm({ addStudent }) {

    const [error, setError] = useState("")

    // Here ref shines! If we had used state for an input field, the component would re-render on every keystroke, but with useRef there's no re-render.
    const firstNameRef = useRef(null)
    const lastNameRef = useRef(null)

    function handleSubmit(e) {
    e.preventDefault();

    const firstName = firstNameRef.current.value.trim();
    const lastName = lastNameRef.current.value.trim();

    if (!firstName || !lastName) {
        setError("Please enter a name");
        return;
    }

    addStudent({ firstName, lastName });
    setError("");

    // ✅ Clear and reset focus
    firstNameRef.current.value = "";
    lastNameRef.current.value = "";
    firstNameRef.current.focus();
    }

    return (
        <form onSubmit={handleSubmit} className="input-form">

            <label htmlFor="firstName" className="input-form__label">First name:</label>
            <input ref={firstNameRef} type="text" name="firstName" id="firstName" className="input-form__input" />

            <label htmlFor="lastName" className="input-form__label">Last name:</label>
            <input ref={lastNameRef} type="text" name="lastName" id="lastName" className="input-form__input" />

            <button type="submit" className="input-form__btn">Add person</button>
            {error && <p className="input-form__error">{error}</p>}
        </form>
    )
}