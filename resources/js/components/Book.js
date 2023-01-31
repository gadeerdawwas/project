import React, { useRef, useState, useEffect } from "react";
import HTMLFlipBook from "react-pageflip";
import { Document, Page } from "react-pdf/dist/esm/entry.webpack";
import ReactDOM from 'react-dom';
const MyPage = React.forwardRef(({ pageNumber }, ref) => {
  return (
    <div ref={ref}>
      <Page pageNumber={pageNumber} />
    </div>
  );
});
const Book = () => {
  const [totalPages, setTotalPages] = useState(0);
  const [currentPageNum, setCurrentPageNum] = useState(1);
  const [pageHeight, setPageHeight] = useState(895);
  const [pageWidth, setPageWidth] = useState(419);
  const [rtl, setRTL] = useState(true);
  const [zoom, setZoom] = useState(1);
  const book = useRef(null);
  const audioRef = useRef(null);
  const onFlip = () => {
    audioRef.current.play();
    if (book.current) {
      let currentPageIndex = book.current.pageFlip().getCurrentPageIndex();
      let currentPage = rtl
        ? totalPages - currentPageIndex
        : currentPageIndex + 1;
      setCurrentPageNum(currentPage);
    }
  };

  function onDocumentLoadSuccess({ numPages }) {
    setTotalPages(numPages);
  }

  const previousPage = () => {
    book.current.pageFlip().flipPrev();
  };

  const nextPage = () => {
    book.current.pageFlip().flipNext();
  };

  const fullScreen = () => {
    let book = document.querySelector(".book");
    if (book.requestFullscreen) {
      book.requestFullscreen();
    }
  };

  useEffect(() => {
    document.addEventListener("keydown", function (e) {
      if (e.key === "ArrowLeft") {
        previousPage();
      } else if (e.key === "ArrowRight") {
        nextPage();
      }
    });
  }, []);

  const onDirChange = () => {
    setRTL(!rtl);
  };

  const goTo = (e) => {
    let pageNum = parseInt(e.target.value);
    if (e.code === "Enter" || e.code === "NumpadEnter") {
      if (pageNum > totalPages) {
        setCurrentPageNum(totalPages);
        book.current.pageFlip().turnToPage(rtl ? 1 : totalPages - 1);
      } else if (pageNum > 0 && pageNum <= totalPages) {
        setCurrentPageNum(pageNum);
        book.current
          .pageFlip()
          .turnToPage(rtl ? totalPages - pageNum : pageNum - 1);
      }
    }
  };

  const zoomIn = () => {
    if (zoom < 1.4) {
      setZoom(zoom + 0.2);
    }
  };
  const restZoom = () => {
    setZoom(1);
  };
  useEffect(() => {
    if (document.querySelector(".book")) {
      document.querySelector(".book").style.scale = zoom;
    }
  }, [zoom]);

  return (
    <>
      {rtl && (
        <Document
          file={"http://localhost/smartLib/file/serve/1653551673.pdf"}
          onLoadSuccess={onDocumentLoadSuccess}
          loading={"Please Wait..."}
        >
          <HTMLFlipBook
            ref={book}
            onFlip={onFlip}
            autoSize={false}
            width={pageWidth}
            height={pageHeight}
            drawShadow={false}
            maxShadowOpacity={0}
            className="book"
            startPage={totalPages - 1}
          >
            {Array.from(new Array(totalPages), (el, index) => (
              <MyPage pageNumber={index + 1} key={index + 1} />
            )).reverse()}
          </HTMLFlipBook>
        </Document>
      )}
      {!rtl && (
        <Document file={"./file2.pdf"} onLoadSuccess={onDocumentLoadSuccess}>
          <HTMLFlipBook
            ref={book}
            onFlip={onFlip}
            autoSize={false}
            width={pageWidth}
            height={pageHeight}
            drawShadow={false}
            maxShadowOpacity={0}
            className="book"
          >
            {Array.from(new Array(totalPages), (el, index) => (
              <MyPage pageNumber={index + 1} key={index + 1} />
            ))}
          </HTMLFlipBook>
        </Document>
      )}
      <div className="control">
        <button onClick={previousPage}>{"<"}</button>
        <div>
          <input
            id="text"
            value={currentPageNum}
            type="number"
            onKeyDown={goTo}
            onChange={(e) => {
              setCurrentPageNum(parseInt(e.target.value));
            }}
          />
          /{totalPages}
        </div>
        <button onClick={nextPage}>{">"}</button>
        <button onClick={zoomIn}>Zoom In</button>
        <button onClick={restZoom}>Rest Zoom</button>
        <button onClick={fullScreen}>Full Screen</button>
        <button onClick={onDirChange}>Change</button>
      </div>
      <audio ref={audioRef} className="audio" src={'./pageFlip.mp3'}></audio>
    </>
  );
};

export default Book;

if (document.getElementById('book')) {
    ReactDOM.render(<Book />, document.getElementById('book'));
}