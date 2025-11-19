import styled from "@emotion/styled";

const MixedListDiv = styled.div`
  grid-column: 2;
  grid-row: 1 / span 2;
  overflow: auto;
  background-color: ${(props) => props.bg};
`;

const Heading = styled.div`
    font-size: 3rem;
    font-weight: 500;
    color: hotpink;
`;

const Subheading = styled(Heading)`
    font-size: 2rem;
    color: black;
`;

export function MixedList() {
    return (
        <MixedListDiv bg="red" className="mixedList">
            <Heading>Mixed</Heading>
            <Subheading>List</Subheading>
        </MixedListDiv>
    )
}