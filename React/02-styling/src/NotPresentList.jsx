const styling = {
    gridColumn: 1,
    gridRow: 2,
    overFlow: "auto",
    backgroundColor: "darksalmon"
}

export function NotPresentList({ children}) {
    return (
        <div style={styling} className="notPresentList">
            <h1>Not present</h1>
            <div>
                { children }
            </div>
        </div>
    )
}