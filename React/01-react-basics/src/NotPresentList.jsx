export function NotPresentList({ children}) {
    return (
        <div className="notPresentList">
            <h1>Not present</h1>
            <div>
                { children }
            </div>
        </div>
    )
}