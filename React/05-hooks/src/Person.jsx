export const Person = ({firstname, lastname, isPresent = true, onClickHandler}) => {
    return (
        <article onClick={onClickHandler} className="person">
            <h2>{ firstname }<span> { lastname }</span></h2>
        </article>
    )
}
